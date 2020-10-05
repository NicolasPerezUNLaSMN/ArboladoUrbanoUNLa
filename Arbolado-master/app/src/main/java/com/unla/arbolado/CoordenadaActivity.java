package com.unla.arbolado;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.Manifest;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.location.LocationProvider;
import android.os.Bundle;
import android.provider.Settings;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.unla.arbolado.SQLite.ArbolSQLite;
import com.unla.arbolado.SQLite.CalleSQLite;
import com.unla.arbolado.SQLite.CensoSQLite;
import com.unla.arbolado.SQLite.CoordenadaSQLite;
import com.unla.arbolado.SQLite.EstadoDelArbolSQLite;
import com.unla.arbolado.SQLite.UsuarioSQLite;
import com.unla.arbolado.modelo.Censo;
import com.unla.arbolado.modelo.Coordenada;

import java.io.IOException;
import java.util.GregorianCalendar;
import java.util.List;
import java.util.Locale;

public class CoordenadaActivity extends AppCompatActivity {

    private EditText et_latitud;
    private EditText et_longitud;
    private LocationManager locationManager;

    private TextView direccion;

    String latitud;
    String longitud ;
    String direccionS ;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_coordenada);

        et_latitud = findViewById(R.id.et_latitud);
        et_longitud = findViewById(R.id.et_longitud);
        locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);

        direccion = (TextView) findViewById(R.id.txtDireccion);



        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION,}, 1000);
        } else {
            locationStart();
        }
    }



    public void continuar(View view) {
        latitud = et_latitud.getText().toString();
        longitud = et_longitud.getText().toString();
        direccionS = direccion.getText().toString();



        if (latitud.isEmpty() || longitud.isEmpty()) {
            Toast.makeText(this, "Debes completar todos los campos", Toast.LENGTH_SHORT).show();
        } else if (Double.parseDouble(latitud) < -90 || Double.parseDouble(latitud) > 90 || Double.parseDouble(longitud) < -180 || Double.parseDouble(longitud) > 180) {
            Toast.makeText(this, "Latitud debe estar entre -90 y 90\nLongitud debe estar entre -180 y 180", Toast.LENGTH_SHORT).show();
        } else {



            Log.d("Para insertar: --->", validarLatitud(latitud)+validarLongitud(longitud)+ direccionS);
            int id = (int) CoordenadaSQLite.getInstance(this).agregar(new Coordenada(validarLatitud(latitud), validarLongitud(longitud), direccionS));
            Toast.makeText(getApplicationContext(), "ID registro: " + id, Toast.LENGTH_SHORT).show();

            int idUsuario = (int) getIntent().getLongExtra("idUsuario", 0);
            int idCalle = (int) getIntent().getLongExtra("idCalle", 0);
            int idArbol = (int) getIntent().getLongExtra("idArbol", 0);
            int idEstadoDelArbol = (int) getIntent().getLongExtra("idEstadoDelArbol", 0);

            //Censo a agregar
            Censo censo = new Censo(UsuarioSQLite.getInstance(this).traer(idUsuario), CalleSQLite.getInstance(this).traer(idCalle),
                    ArbolSQLite.getInstance(this).traer(idArbol), EstadoDelArbolSQLite.getInstance(this).traer(idEstadoDelArbol),
                    CoordenadaSQLite.getInstance(this).traer(id));


            CensoSQLite.getInstance(this).agregar(censo);

            Intent intent = new Intent(this, CamaraActivity.class);


            startActivity(intent);
        }
    }


    private String validarLatitud(String latitud) {
        String[] lat = latitud.split("\\.");
        String l;

        if (lat.length == 1)
            l = lat[0];
        else if (lat[1].length() < 5)
            l = lat[0] + "." + lat[1];
        else
            l = lat[0] + "." + lat[1].substring(0, 5);

        return l;
    }

    private String validarLongitud(String longitud) {
        String[] lon = longitud.split("\\.");
        String l;

        if (lon.length == 1)
            l = lon[0];
        else if (lon[1].length() < 5)
            l = lon[0] + "." + lon[1];
        else
            l = lon[0] + "." + lon[1].substring(0, 5);

        return l;
    }


    private void locationStart() {
        LocationManager mlocManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
        Localizacion Local = new Localizacion();
        Local.setCoordenadaActivity(this);
        final boolean gpsEnabled = mlocManager.isProviderEnabled(LocationManager.GPS_PROVIDER);
        if (!gpsEnabled) {
            Intent settingsIntent = new Intent(Settings.ACTION_LOCATION_SOURCE_SETTINGS);
            startActivity(settingsIntent);
        }
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION,}, 1000);
            return;
        }
        mlocManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 0, 0, (LocationListener) Local);
        mlocManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 0, 0, (LocationListener) Local);
        et_latitud.setText("Localización agregada");
        direccion.setText("");
    }



    public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {
        if (requestCode == 1000) {
            if (grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                locationStart();
                return;
            }
        }
    }
    public void setLocation(Location loc) {
        //Obtener la direccion de la calle a partir de la latitud y la longitud
        if (loc.getLatitude() != 0.0 && loc.getLongitude() != 0.0) {
            try {
                Geocoder geocoder = new Geocoder(this, Locale.getDefault());
                List<Address> list = geocoder.getFromLocation(
                        loc.getLatitude(), loc.getLongitude(), 1);
                if (!list.isEmpty()) {
                    Address DirCalle = list.get(0);
                    direccion.setText(DirCalle.getAddressLine(0));
                }
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
    /* Aqui empieza la Clase Localizacion */
    public class Localizacion implements LocationListener {

        CoordenadaActivity coordenadaActivity;
        public CoordenadaActivity getCoordenadaActivity() {
            return coordenadaActivity;
        }
        public void setCoordenadaActivity(CoordenadaActivity coordenadaActivity) {
            this.coordenadaActivity = coordenadaActivity;
        }
        @Override
        public void onLocationChanged(Location loc) {
            // Este metodo se ejecuta cada vez que el GPS recibe nuevas coordenadas
            // debido a la deteccion de un cambio de ubicacion
            loc.getLatitude();
            loc.getLongitude();
            String sLatitud = String.valueOf(loc.getLatitude());
            String sLongitud = String.valueOf(loc.getLongitude());
            et_latitud.setText(sLatitud);
            et_longitud.setText(sLongitud);




            this.coordenadaActivity.setLocation(loc);
        }
        @Override
        public void onProviderDisabled(String provider) {
            // Este metodo se ejecuta cuando el GPS es desactivado
            et_latitud.setText("GPS Desactivado");
        }
        @Override
        public void onProviderEnabled(String provider) {
            // Este metodo se ejecuta cuando el GPS es activado
            et_latitud.setText("GPS Activado");
        }
        @Override
        public void onStatusChanged(String provider, int status, Bundle extras) {
            switch (status) {
                case LocationProvider.AVAILABLE:
                    Log.d("debug", "LocationProvider.AVAILABLE");
                    break;
                case LocationProvider.OUT_OF_SERVICE:
                    Log.d("debug", "LocationProvider.OUT_OF_SERVICE");
                    break;
                case LocationProvider.TEMPORARILY_UNAVAILABLE:
                    Log.d("debug", "LocationProvider.TEMPORARILY_UNAVAILABLE");
                    break;
            }
        }




    }


    /*
    public void actualizar(View view) {
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED &&
                ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {

            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, 2);
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_COARSE_LOCATION}, 2);
            return;
        }
        if (!locationManager.isProviderEnabled(LocationManager.GPS_PROVIDER)) {
            Toast.makeText(this, "Activar GPS", Toast.LENGTH_SHORT).show();
        } else {
            Toast.makeText(this, "Buscando coordenadas, espere un momento...", Toast.LENGTH_SHORT).show();
        }
        locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 1000, 5, this);
    }

    @Override
    public void onLocationChanged(Location location) {
        et_latitud.setText(location.getLatitude() + "");
        et_longitud.setText(location.getLongitude() + "");
    }

    @Override
    public void onStatusChanged(String s, int i, Bundle bundle) {

    }

    @Override
    public void onProviderEnabled(String s) {

    }

    @Override
    public void onProviderDisabled(String s) {

    }

    public void continuar(View view) {
        String latitud = et_latitud.getText().toString();
        String longitud = et_longitud.getText().toString();

        if (latitud.isEmpty() || longitud.isEmpty()) {
            Toast.makeText(this, "Debes completar todos los campos", Toast.LENGTH_SHORT).show();
        } else if (Double.parseDouble(latitud) < -90 || Double.parseDouble(latitud) > 90 || Double.parseDouble(longitud) < -180 || Double.parseDouble(longitud) > 180) {
            Toast.makeText(this, "Latitud debe estar entre -90 y 90\nLongitud debe estar entre -180 y 180", Toast.LENGTH_SHORT).show();
        } else {
            int id = (int) CoordenadaSQLite.getInstance(this).agregar(new Coordenada(validarLatitud(latitud), validarLongitud(longitud)));
            Toast.makeText(getApplicationContext(), "ID registro: " + id, Toast.LENGTH_SHORT).show();

            int idUsuario = (int) getIntent().getLongExtra("idUsuario", 0);
            int idCalle = (int) getIntent().getLongExtra("idCalle", 0);
            int idArbol = (int) getIntent().getLongExtra("idArbol", 0);
            int idEstadoDelArbol = (int) getIntent().getLongExtra("idEstadoDelArbol", 0);

            //Censo a agregar
            Censo censo = new Censo(UsuarioSQLite.getInstance(this).traer(idUsuario), CalleSQLite.getInstance(this).traer(idCalle),
                    ArbolSQLite.getInstance(this).traer(idArbol), EstadoDelArbolSQLite.getInstance(this).traer(idEstadoDelArbol),
                    CoordenadaSQLite.getInstance(this).traer(id));


            CensoSQLite.getInstance(this).agregar(censo);

            Intent intent = new Intent(this, CamaraActivity.class);


            startActivity(intent);
        }
    }

    private String validarLatitud(String latitud) {
        String[] lat = latitud.split("\\.");
        String l;

        if (lat.length == 1)
            l = lat[0];
        else if (lat[1].length() < 5)
            l = lat[0] + "." + lat[1];
        else
            l = lat[0] + "." + lat[1].substring(0, 5);

        return l;
    }

    private String validarLongitud(String longitud) {
        String[] lon = longitud.split("\\.");
        String l;

        if (lon.length == 1)
            l = lon[0];
        else if (lon[1].length() < 5)
            l = lon[0] + "." + lon[1];
        else
            l = lon[0] + "." + lon[1].substring(0, 5);

        return l;
    }

    */

}//Cierra coordenadas activuty