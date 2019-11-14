package com.unla.arbolado;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
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

import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.List;
import java.util.Map;


public class EnviarRegistrosActivity extends AppCompatActivity {

    private ListView listView;
    private List<Censo> censos;
    private List<String> info;

    private boolean errorConectar = false;

    final String CARPETA_RAIZ = "Arbo";
    final String CARPETA_IMAGENES = "lado";
    final String RUTA_IMAGEN = CARPETA_RAIZ + CARPETA_IMAGENES;

    //Lista de imagenes que aun no se subieron
    List<String> list = new ArrayList<String>();
    //obtiene ruta donde se encuentran los archivos.


    private ImageView imageView;




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_enviarregistros);

        imageView = (ImageView) findViewById(R.id.image_view);

    }

    @Override
    protected void onStart() {
        super.onStart();

        censos = CensoSQLite.getInstance(this).traer(this);





        for(Censo c: censos){



            //ejecutarServicio("http://192.168.0.7:80/ArboladoUrbanoUnla/insert1.php", c);


            ejecutarServicio("https://arboladourbanounla.000webhostapp.com/insertPrueba.php", c);
		
		//Si no hubo error borro
                if(!errorConectar){
                CensoSQLite.getInstance(this).eliminar(c.getIdCenso());}




        }





    }




    private void ejecutarServicio(String URL, final Censo c){

        errorConectar = false;
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>(){

            @Override
            public void onResponse(String response){
                Toast.makeText(getApplicationContext(), "OPERACION EXITOSA - Se almaceno correctamente", Toast.LENGTH_SHORT).show();
            }
        }, new Response.ErrorListener(){
            @Override
            public void onErrorResponse(VolleyError error){
		errorConectar = true;
                Toast.makeText(getApplicationContext(), "Ha fallado la conexion", Toast.LENGTH_SHORT).show();
                
            }

        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError{
                Map<String, String> parametros = new HashMap<String, String>();


                //muestro los parametros del censo a ver como llegaron hasta aca
                Log.d("myTag - arbol", c.getArbol().toString());
                Log.d("myTag - calle", c.getCalle().toString());
                Log.d("myTag - coordenada", c.getCoordenada().toString());
                Log.d("myTag - estado", c.getEstadoDelArbol().toString());
                Log.d("myTag - usuario", c.getUsuario().toString());


                File fileImagen = new File(Environment.getExternalStorageDirectory(), RUTA_IMAGEN);


                //obtiene nombres de archivos dentro del directorio.
                File file[] = fileImagen.listFiles();

                for (int i=0; i < file.length; i++)
                {
                    Log.d("Files", "Archivo -------->>: " + file[i].getName());
                    //Agrega nombres de archivos a List para ser agregado a adapter.
                    list.add(file[i].getName());


                }

                ArrayList<String> fotosASubir = new ArrayList<>();

                //muestro la lista
                for (String direccion:list){

                    if((fileImagen + File.separator +direccion).contains("reg_"+c.getIdCenso()+"_")){
                        fotosASubir.add(fileImagen + File.separator +direccion);
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
                parametros.put("anchoVereda",  Float.toString(c.getCalle().getAnchoVereda()));
                parametros.put("paridad", c.getCalle().getParidad());
                parametros.put("transito", c.getCalle().getTransito());

                //parametros arbol
                parametros.put("especie", c.getArbol().getEspecie());
                parametros.put("numeroArbol", String.valueOf(c.getArbol().getNumeroArbol()));
                parametros.put("distanciaEntrePlantas",  Float.toString(c.getArbol().getDistanciaEntrePlantas()));
                parametros.put("distanciaAlMuro",  Float.toString(c.getArbol().getDistanciaAlMuro()));
                parametros.put("circunferenciaDelArbol",  Float.toString(c.getArbol().getCircunferenciaDelArbol()));
                parametros.put("cazuela", c.getArbol().getCazuela());
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

                //parametros usuario
                parametros.put("nombreU", c.getUsuario().getNombre());
                parametros.put("apellido", c.getUsuario().getApellido());
                parametros.put("dni", String.valueOf(c.getUsuario().getDni()));


                //Creo el bitmap
                Log.d("------zCreo bitmap", fotosASubir.get(0));
                Bitmap bitmap = BitmapFactory.decodeFile(fotosASubir.get(0));


                imageView.setImageBitmap(bitmap);


                ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
                bitmap.compress(Bitmap.CompressFormat.PNG, 100, byteArrayOutputStream);
                byte[] byteArray = byteArrayOutputStream .toByteArray();
                String base64OfBitmap = Base64.encodeToString(byteArray, Base64.DEFAULT);



                parametros.put("image", base64OfBitmap);







                return parametros;

            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);


    }


    public static String traerFechaCortaConHora(GregorianCalendar fecha){
        return (fecha.get(GregorianCalendar.DAY_OF_MONTH) +"/" + (fecha.get(GregorianCalendar.MONTH)+1)
                + "/" + fecha.get(GregorianCalendar.YEAR) + " " + fecha.get(GregorianCalendar.HOUR_OF_DAY) + ":" +
                fecha.get(GregorianCalendar.MINUTE) + ":" + fecha.get(GregorianCalendar.SECOND));
    }


    public String getStringImage(Bitmap bmp){
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, 100, baos);
        byte[] imageBytes = baos.toByteArray();
        String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
        return encodedImage;
    }



}
