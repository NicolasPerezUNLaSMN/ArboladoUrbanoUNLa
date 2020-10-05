package com.unla.arbolado;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Environment;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.unla.arbolado.SQLite.CensoSQLite;
import com.unla.arbolado.modelo.Censo;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.net.ssl.HttpsURLConnection;


public class EnviarRegistrosActivity extends AppCompatActivity {

    private ListView listView;
    private List<Censo> censos;
    private List<String> info;

    int censosEnviardos = 0;
    int censosErroneos = 0;




    private boolean errorConectar = false;

    final String CARPETA_RAIZ = "Arbo";
    final String CARPETA_IMAGENES = "lado";
    final String RUTA_IMAGEN = CARPETA_RAIZ + CARPETA_IMAGENES;



    //Lista de imagenes que aun no se subieron
    List<String> list = new ArrayList<String>();
    //obtiene ruta donde se encuentran los archivos.







    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_enviarregistros);





    }

    @Override
    protected void onStart() {
        super.onStart();

        censos = CensoSQLite.getInstance(this).traer(this);

        int cantidadAEnviar = cantidadAEnviar();

        int tiempoEstimado = cantidadAEnviar()*15;

        Toast.makeText(this, "Usted tiene la siguiente cantidad de censos sin enviar: "+cantidadAEnviar() , Toast.LENGTH_SHORT).show();
        Toast.makeText(this, "Esto demorará alrededor de  "+tiempoEstimado +" segundos...", Toast.LENGTH_SHORT).show();


        //int bucle = 0;
        //for(Censo c: censos){




            //ejecutarServicio("http://192.168.0.7:80/ArboladoUrbanoUnla/insert1.php", c);


            ejecutarServicio("https://unla-arbolado-urbano.000webhostapp.com/insertPrueba.php", censos, cantidadAEnviar);




		
		//Si no hubo error borro
                //if(!errorConectar){
                //CensoSQLite.getInstance(this).eliminar(c.getIdCenso());
               // }


            //tiempoEstimado = tiempoEstimado -15;
            //Toast.makeText(this, "Faltan....  "+tiempoEstimado +" segundos...", Toast.LENGTH_SHORT).show();




        }



    //}




    private void ejecutarServicio(String URL, final List<Censo> censos, int cantidad) {


        for (Censo c : censos){

            errorConectar = false;
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {

                censosEnviardos++;
                Toast.makeText(getApplicationContext(), "PROGRESO: " + (((censosEnviardos + censosErroneos) * 100) / (cantidad)) + "%...", Toast.LENGTH_SHORT).show();
                Toast.makeText(getApplicationContext(), "Se han enviado satisfactoriamente: " + censosEnviardos + " censos.", Toast.LENGTH_SHORT).show();
                Toast.makeText(getApplicationContext(), "Ha fallado el enviado de: " + censosErroneos + " censos.", Toast.LENGTH_SHORT).show();
                CensoSQLite.getInstance(getApplicationContext()).eliminar(c.getIdCenso());


            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                errorConectar = true;
                censosErroneos++;
                Toast.makeText(getApplicationContext(), "PROGRESO: " + (((censosEnviardos + censosErroneos) * 100) / (cantidad)) + "%...", Toast.LENGTH_SHORT).show();
                Toast.makeText(getApplicationContext(), "Se han enviado satisfactoriamente: " + censosEnviardos + " censos.", Toast.LENGTH_SHORT).show();
                Toast.makeText(getApplicationContext(), "Ha fallado el enviado de: " + censosErroneos + " censos.", Toast.LENGTH_SHORT).show();

            }

        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> parametros = new HashMap<String, String>();


                //muestro los parametros del censo a ver como llegaron hasta aca
                Log.d("---INTENTO ENVIAR---", String.valueOf(c.getIdCenso()));
                Log.d("myTag - arbol", c.getArbol().toString());
                Log.d("myTag - calle", c.getCalle().toString());
                Log.d("myTag - coordenada", c.getCoordenada().toString());
                Log.d("myTag - estado", c.getEstadoDelArbol().toString());
                Log.d("myTag - usuario", c.getUsuario().toString());


                File fileImagen = new File(Environment.getExternalStorageDirectory(), RUTA_IMAGEN);


                //obtiene nombres de archivos dentro del directorio.
                File file[] = fileImagen.listFiles();

                for (int i = 0; i < file.length; i++) {
                   // Log.d("Files", "Archivo -------->>: " + file[i].getName());
                    //Agrega nombres de archivos a List para ser agregado a adapter.
                    list.add(file[i].getName());


                }

                ArrayList<String> fotosASubir = new ArrayList<>();

                //muestro la lista
                for (String direccion : list) {

                   // Log.d("Debo enviar: ", direccion);
                    //Log.d("comparo con: ", fileImagen + File.separator + direccion);

                    if ((fileImagen + File.separator + direccion).contains("reg_" + c.getIdCenso() + "_")) {

                        Log.d("PARA ENVIAR: ", fileImagen + File.separator + direccion);
                        fotosASubir.add(fileImagen + File.separator + direccion);
                    }

                }


                //Fecha y hora del censo
                parametros.put("fechaHora", traerFechaCortaConHora(new GregorianCalendar()));

                //parametros.put("fechaHora", "22121212");
                //parametros coordenada
                parametros.put("latitud", c.getCoordenada().getLatitud());
                parametros.put("longitud", c.getCoordenada().getLongitud());

                //parametros calle
                parametros.put("nombre", c.getCalle().getNombre());
                parametros.put("numeroFrente", String.valueOf(c.getCalle().getNumeroFrente()));
                parametros.put("anchoVereda", Float.toString(c.getCalle().getAnchoVereda()));
                parametros.put("paridad", c.getCalle().getParidad());
                parametros.put("transito", c.getCalle().getTransito());

                //parametros arbol
                parametros.put("especie", c.getArbol().getEspecie());
                parametros.put("numeroArbol", String.valueOf(c.getArbol().getNumeroArbol()));
                parametros.put("distanciaEntrePlantas", Float.toString(c.getArbol().getDistanciaEntrePlantas()));
                parametros.put("distanciaAlMuro", Float.toString(c.getArbol().getDistanciaAlMuro()));
                parametros.put("circunferenciaDelArbol", Float.toString(c.getArbol().getCircunferenciaDelArbol()));
                parametros.put("cazuela", c.getArbol().getCazuela());

                parametros.put("diametroDelArbol", Float.toString(c.getArbol().getDiametroDelArbol()));
                parametros.put("altura", Float.toString(c.getArbol().getAltura()));
                parametros.put("distanciaAlCordon", Float.toString(c.getArbol().getDistanciaAlCordon()));

                parametros.put("comentario", c.getArbol().getComentario());

                //parametros estado del arbol
                parametros.put("estadoSanitario", c.getEstadoDelArbol().getEstadoSanitario());
                parametros.put("inclinacion", c.getEstadoDelArbol().getInclinacion());
                parametros.put("ahuecamiento", c.getEstadoDelArbol().getAhuecamiento());
                parametros.put("cable", c.getEstadoDelArbol().getCables());
                parametros.put("luminaria", c.getEstadoDelArbol().getLuminaria());
                parametros.put("danios", c.getEstadoDelArbol().getDaños());
                parametros.put("veredas", c.getEstadoDelArbol().getVeredas());
                parametros.put("podas", c.getEstadoDelArbol().getPodas());

                parametros.put("raices", c.getEstadoDelArbol().getRaices());
                parametros.put("superficieAfectada", c.getEstadoDelArbol().getSuperficieAfectada());
                parametros.put("afecto", c.getEstadoDelArbol().getAfecto());


                //parametros usuario
                parametros.put("nombreU", c.getUsuario().getNombre());
                parametros.put("apellido", c.getUsuario().getApellido());
                parametros.put("dni", String.valueOf(c.getUsuario().getDni()));


                Map<String, String[]> parametrosFotos = new HashMap<String, String[]>();

                //Creo el bitmap
                //Log.d("------Creo bitmap---->", fotosASubir.get(0));

                //Todas las fotos
                int i = 0;


                //Agrego todas las fotos
                for (String foto : fotosASubir) {


                    BitmapFactory.Options btOptions = new BitmapFactory.Options();
                    btOptions.inSampleSize = 8;


                    Bitmap bitmap = BitmapFactory.decodeFile(foto, btOptions);

                    //ImageView imageView = new ImageView(EnviarRegistrosActivity.this);
                    //imageView.setImageBitmap(bitmap);
                    //ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
                    //bitmap.compress(Bitmap.CompressFormat.PNG, 10, byteArrayOutputStream);
                    //byte[] byteArray = byteArrayOutputStream .toByteArray();
                    //String base64OfBitmap = Base64.encodeToString(byteArray, Base64.DEFAULT);


                    String imagenEnBase64 = getStringImage(bitmap);

                    parametros.put("image_" + i, imagenEnBase64);

                    Log.d("----> envie: ", "image_" + i);


                    i++;
                }


                parametros.put("cantidadDeImagenes", String.valueOf(i));


                return parametros;

            }


        };


        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }


        Intent intent = new Intent(this, MainActivity.class);

        startActivity(intent);

    } //Cierra ejecutar servicio


    public static String traerFechaCortaConHora(GregorianCalendar fecha){
        return (fecha.get(GregorianCalendar.DAY_OF_MONTH) +"/" + (fecha.get(GregorianCalendar.MONTH)+1)
                + "/" + fecha.get(GregorianCalendar.YEAR) + " " + fecha.get(GregorianCalendar.HOUR_OF_DAY) + ":" +
                fecha.get(GregorianCalendar.MINUTE) + ":" + fecha.get(GregorianCalendar.SECOND));
    }


    public String getStringImage(Bitmap bmp){

        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.PNG, 0, baos);
        byte[] imageBytes = baos.toByteArray();
        String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
        return encodedImage;

    }


    public int cantidadAEnviar(){

        int i = 0;
        for (Censo c: censos){

            i++;
        }
        return i;
    }










}





