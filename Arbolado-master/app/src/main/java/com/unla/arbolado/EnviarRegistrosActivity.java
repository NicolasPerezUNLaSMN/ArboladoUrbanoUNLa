package com.unla.arbolado;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
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

import java.util.ArrayList;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.List;
import java.util.Map;


public class EnviarRegistrosActivity extends AppCompatActivity {

    private ListView listView;
    private List<Censo> censos;
    private List<String> info;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_enviarregistros);
    }

    @Override
    protected void onStart() {
        super.onStart();

        censos = CensoSQLite.getInstance(this).traer(this);


        for(Censo c: censos){



            //ejecutarServicio("http://192.168.0.7:80/ArboladoUrbanoUnla/insert1.php", c);


            ejecutarServicio("https://arboladourbanounla.000webhostapp.com/insertPrueba.php", c);

                CensoSQLite.getInstance(this).eliminar(c.getIdCenso());




        }





    }




    private void ejecutarServicio(String URL, final Censo c){

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>(){

            @Override
            public void onResponse(String response){
                Toast.makeText(getApplicationContext(), "OPERACION EXITOSA - Se almaceno correctamente", Toast.LENGTH_SHORT).show();
            }
        }, new Response.ErrorListener(){
            @Override
            public void onErrorResponse(VolleyError error){

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
}
