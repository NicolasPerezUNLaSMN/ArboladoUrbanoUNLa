package com.unla.arbolado;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.os.Environment;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

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
import java.util.ArrayList;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class DetalleActivity extends AppCompatActivity {


    private Button bt_enviar;
    private Button bt_eliminar;

    private TextView tv_nombre_u;
    private TextView tv_apellido_u;
    private TextView tv_dni_u;
    private TextView tv_nombre_c;
    private TextView tv_numero_c;
    private TextView tv_ancho_c;
    private TextView tv_paridad_c;
    private TextView tv_transito_c;
    private TextView tv_especie_a;
    private TextView tv_numero_a;
    private TextView tv_distanciaplantas_a;
    private TextView tv_distanciamuro_a;
    private TextView tv_circunferencia_a;
    private TextView tv_cazuela_a;
    private TextView tv_comentario_a;
    private TextView tv_estadosanitario_e;
    private TextView tv_inclinacion_e;
    private TextView tv_ahuecamiento_e;
    private TextView tv_cables_e;
    private TextView tv_luminaria_e;
    private TextView tv_danos_e;
    private TextView tv_veredas_e;
    private TextView tv_podas_e;
    private TextView tv_latitud_co;
    private TextView tv_longitud_co;
    private Censo censo;



    int censosEnviardos = 0;
;




    private boolean errorConectar = false;

    final String CARPETA_RAIZ = "Arbo";
    final String CARPETA_IMAGENES = "lado";
    final String RUTA_IMAGEN = CARPETA_RAIZ + CARPETA_IMAGENES;

    List<String> list = new ArrayList<String>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detalle);

        tv_nombre_u = findViewById(R.id.tv_nombre_u);
        tv_apellido_u = findViewById(R.id.tv_apellido_u);
        tv_dni_u = findViewById(R.id.tv_dni_u);
        tv_nombre_c = findViewById(R.id.tv_nombre_c);
        tv_numero_c = findViewById(R.id.tv_numero_c);
        tv_ancho_c = findViewById(R.id.tv_ancho_c);
        tv_paridad_c = findViewById(R.id.tv_paridad_c);
        tv_transito_c = findViewById(R.id.tv_transito_c);
        tv_especie_a = findViewById(R.id.tv_especie_a);
        tv_numero_a = findViewById(R.id.tv_numero_a);
        tv_distanciaplantas_a = findViewById(R.id.tv_distanciaplantas_a);
        tv_distanciamuro_a = findViewById(R.id.tv_distanciamuro_a);
        tv_circunferencia_a = findViewById(R.id.tv_circunferencia_a);
        tv_cazuela_a = findViewById(R.id.tv_cazuela_a);
        tv_comentario_a = findViewById(R.id.tv_comentario_a);
        tv_estadosanitario_e = findViewById(R.id.tv_estadosanitario_e);
        tv_inclinacion_e = findViewById(R.id.tv_inclinacion_e);
        tv_ahuecamiento_e = findViewById(R.id.tv_ahuecamiento_e);
        tv_cables_e = findViewById(R.id.tv_cables_e);
        tv_luminaria_e = findViewById(R.id.tv_luminaria_e);
        tv_danos_e = findViewById(R.id.tv_danos_e);
        tv_veredas_e = findViewById(R.id.tv_veredas_e);
        tv_podas_e = findViewById(R.id.tv_podas_e);
        tv_latitud_co = findViewById(R.id.tv_latitud_co);
        tv_longitud_co = findViewById(R.id.tv_longitud_co);

        Bundle bundle = getIntent().getExtras();
        censo = null;



        bt_eliminar = this.findViewById(R.id.btn_eliminar);
        bt_enviar = this.findViewById(R.id.btn_enviar);

        if (bundle != null) {
            censo = (Censo) bundle.getSerializable("censo");
            tv_nombre_u.setText(censo.getUsuario().getNombre().toString());
            tv_apellido_u.setText(censo.getUsuario().getApellido().toString());
            tv_dni_u.setText(String.valueOf(censo.getUsuario().getDni()));

            tv_nombre_c.setText(censo.getCalle().getNombre().toString());
            tv_numero_c.setText(String.valueOf(censo.getCalle().getNumeroFrente()));
            tv_ancho_c.setText(String.valueOf(censo.getCalle().getAnchoVereda()));
            tv_paridad_c.setText(censo.getCalle().getParidad().toString());
            tv_transito_c.setText(censo.getCalle().getTransito().toString());

            tv_especie_a.setText(censo.getArbol().getEspecie().toString());
            tv_numero_a.setText(String.valueOf(censo.getArbol().getNumeroArbol()));
            tv_distanciaplantas_a.setText(String.valueOf(censo.getArbol().getDistanciaEntrePlantas()));
            tv_distanciamuro_a.setText(String.valueOf(censo.getArbol().getDistanciaAlMuro()));
            tv_circunferencia_a.setText(String.valueOf(censo.getArbol().getCircunferenciaDelArbol()));
            tv_cazuela_a.setText(censo.getArbol().getCazuela().toString());
            tv_comentario_a.setText(censo.getArbol().getComentario().toString());

            tv_estadosanitario_e.setText(censo.getEstadoDelArbol().getEstadoSanitario().toString());
            tv_inclinacion_e.setText(censo.getEstadoDelArbol().getInclinacion().toString());
            tv_ahuecamiento_e.setText(censo.getEstadoDelArbol().getAhuecamiento().toString());
            tv_cables_e.setText(censo.getEstadoDelArbol().getCables().toString());
            tv_luminaria_e.setText(censo.getEstadoDelArbol().getLuminaria().toString());
            tv_danos_e.setText(censo.getEstadoDelArbol().getDaños().toString());
            tv_veredas_e.setText(censo.getEstadoDelArbol().getVeredas().toString());
            tv_podas_e.setText(censo.getEstadoDelArbol().getPodas().toString());

            tv_latitud_co.setText(censo.getCoordenada().getLatitud().toString());
            tv_longitud_co.setText(censo.getCoordenada().getLongitud().toString());
        }


        //Añadimos el Listener Boton
        bt_eliminar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {



                eliminar();
            }



        });

        bt_enviar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {



                enviar();
            }



        });






    }

    public void eliminar() {
        AlertDialog.Builder alerta = new AlertDialog.Builder(this);
        alerta.setMessage("Desea eliminar el registro?")
                .setCancelable(true)
                .setPositiveButton("Sí", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        int n = CensoSQLite.getInstance(DetalleActivity.this).eliminar(censo.getIdCenso());
                        if (n == 1)
                            Toast.makeText(DetalleActivity.this, "Se elimino correctamente", Toast.LENGTH_SHORT).show();
                        if (n == 0)
                            Toast.makeText(DetalleActivity.this, "No se pudo eliminar", Toast.LENGTH_SHORT).show();
                        finish();
                    }
                })
                .setNegativeButton("No", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        dialogInterface.cancel();
                    }
                });
        AlertDialog titulo = alerta.create();
        titulo.setTitle("Eliminar");
        titulo.show();
    }


    public void enviar (){


        AlertDialog.Builder alerta = new AlertDialog.Builder(this);
        alerta.setMessage("Desea enviar el registro?")
                .setCancelable(true)
                .setPositiveButton("Sí", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {

                        /*
                        int n = CensoSQLite.getInstance(DetalleActivity.this).eliminar(censo.getIdCenso());
                        if (n == 1)
                            Toast.makeText(DetalleActivity.this, "Se elimino correctamente", Toast.LENGTH_SHORT).show();
                        if (n == 0)
                            Toast.makeText(DetalleActivity.this, "No se pudo eliminar", Toast.LENGTH_SHORT).show();
                        finish();

                        */
                        Toast.makeText(getApplicationContext(), "Este censo posee: " +censo.cantidadDeFotosParaEnviar() +"foto/s.", Toast.LENGTH_SHORT).show();
                        Toast.makeText(getApplicationContext(), "El proceso puede demorar alrededor de: " +3.5*censo.cantidadDeFotosParaEnviar() +" segundos.", Toast.LENGTH_SHORT).show();
                        ejecutarServicio("https://unla-arbolado-urbano.000webhostapp.com/insertPrueba.php", censo);



                    }
                })
                .setNegativeButton("No", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        dialogInterface.cancel();
                    }
                });
        AlertDialog titulo = alerta.create();
        titulo.setTitle("Enviar");
        titulo.show();



    }


    private void ejecutarServicio(String URL, final Censo c) {




        errorConectar = false;
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {

                censosEnviardos++;

                Toast.makeText(getApplicationContext(), "Hemos enviado sin problemas su censo.", Toast.LENGTH_SHORT).show();
                Toast.makeText(getApplicationContext(), "Se ha eliminado de su celular, el censo y las fotos.", Toast.LENGTH_SHORT).show();
               // c.eliminarFotosLuegoDeEnviar(); No se por qué no borra
                CensoSQLite.getInstance(getApplicationContext()).eliminar(c.getIdCenso());


            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Toast.makeText(getApplicationContext(), "Ha ocurrido un error. Intente mas tarde o contactemos.", Toast.LENGTH_SHORT).show();
                Toast.makeText(getApplicationContext(), "El censo seguira en su celular, nada se ha perdido.", Toast.LENGTH_SHORT).show();


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

                    if ((fileImagen + File.separator + direccion).contains("reg_" +c.getIdCenso() + "_")) {

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
                parametros.put("direccion", c.getCoordenada().getDireccion());

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

                    Log.d("Esta foto debo enviar: ", foto);
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



}



