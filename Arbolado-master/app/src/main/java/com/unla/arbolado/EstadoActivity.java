package com.unla.arbolado;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import com.unla.arbolado.SQLite.EstadoDelArbolSQLite;
import com.unla.arbolado.modelo.EstadoDelArbol;

public class EstadoActivity extends AppCompatActivity {

    private Spinner s_estadosanitario;
    private Spinner s_inclinacion;
    private Spinner s_ahuecamiento;
    private Spinner s_cables;
    private Spinner s_luminaria;
    private Spinner s_danos;
    private Spinner s_veredas;
    private Spinner s_podas;
    private Spinner s_raices;
    private Spinner s_superficieAfectada;
    private Spinner s_afecto;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_estado);

        s_estadosanitario = findViewById(R.id.s_estadosanitario);
        s_inclinacion = findViewById(R.id.s_inclinacion);
        s_ahuecamiento = findViewById(R.id.s_ahuecamiento);
        s_cables = findViewById(R.id.s_cables);
        s_luminaria = findViewById(R.id.s_luminaria);
        s_danos = findViewById(R.id.s_danos);
        s_veredas = findViewById(R.id.s_veredas);
        s_podas = findViewById(R.id.s_podas);
        s_raices = findViewById(R.id.s_raices);
        s_superficieAfectada = findViewById(R.id.s_superficieAfectada);
        s_afecto = findViewById(R.id.s_afecto);

        String[] op_estadosanitario = {"Estado Sanitario","S", "D", "M"};
        String[] op_inclinacion = {"Inclinacion","NO", "LI", "MI"};
        String[] op_ahuecamiento = {"Ahuecamiento","<50%", ">50%", "NO"};
        String[] op_cables = {"Cables","PD", "PE", "IA"};
        String[] op_luminaria = {"Luminaria","PD", "PE", "IA"};
        String[] op_danos = {"Daños","SI", "NO"};
        String[] op_veredas = {"Veredas","NO", "L", "I"};
        String[] op_podas = {"Podas","NO", "L", "S"};
        String[] op_raices = {"NORMAL", "20%", "40", "60","80","100"};
        String[] op_supercieAfectada= {"Metros Cuadrados:" ,"<1" ,"<2" ,"<3"+"<4","<5",">5", ">10"};
        String[] op_afecto = {"Afecto","Caños", "desagües", "paredes", "piso","otro"};




        ArrayAdapter<String> ad_estadosanitario = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_estadosanitario);
        ArrayAdapter<String> ad_inclinacion = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_inclinacion);
        ArrayAdapter<String> ad_ahuecamiento = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_ahuecamiento);
        ArrayAdapter<String> ad_cables = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_cables);
        ArrayAdapter<String> ad_luminaria = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_luminaria);
        ArrayAdapter<String> ad_danos = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_danos);
        ArrayAdapter<String> ad_veredas = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_veredas);
        ArrayAdapter<String> ad_podas = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_podas);
        ArrayAdapter<String> ad_raices = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_raices);
        ArrayAdapter<String> ad_superficieAfectada = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_supercieAfectada);
        ArrayAdapter<String> ad_afecto = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, op_afecto);

        s_estadosanitario.setAdapter(ad_estadosanitario);
        s_inclinacion.setAdapter(ad_inclinacion);
        s_ahuecamiento.setAdapter(ad_ahuecamiento);
        s_cables.setAdapter(ad_cables);
        s_luminaria.setAdapter(ad_luminaria);
        s_danos.setAdapter(ad_danos);
        s_veredas.setAdapter(ad_veredas);
        s_podas.setAdapter(ad_podas);
        s_raices.setAdapter(ad_raices);
        s_superficieAfectada.setAdapter(ad_superficieAfectada);
        s_afecto.setAdapter(ad_afecto);
    }

    public void continuar(View view) {
        String estadosanitario = s_estadosanitario.getSelectedItem().toString();
        String inclinacion = s_inclinacion.getSelectedItem().toString();
        String ahuecamiento = s_ahuecamiento.getSelectedItem().toString();
        String cables = s_cables.getSelectedItem().toString();
        String luminaria = s_luminaria.getSelectedItem().toString();
        String danos = s_danos.getSelectedItem().toString();
        String veredas = s_veredas.getSelectedItem().toString();
        String podas = s_podas.getSelectedItem().toString();
        String raices= s_raices.getSelectedItem().toString();
        String superficieAfectada = s_superficieAfectada.getSelectedItem().toString();
        String afecto= s_afecto.getSelectedItem().toString();

        long id = EstadoDelArbolSQLite.getInstance(this).agregar(new EstadoDelArbol(estadosanitario, inclinacion, ahuecamiento, cables, luminaria, danos, veredas, podas, raices, superficieAfectada, afecto));
        Toast.makeText(getApplicationContext(), "ID registro: " + id, Toast.LENGTH_SHORT).show();

        Intent intent = new Intent(this, CoordenadaActivity.class);
        intent.putExtra("idUsuario", getIntent().getLongExtra("idUsuario", 0));
        intent.putExtra("idCalle", getIntent().getLongExtra("idCalle", 0));
        intent.putExtra("idArbol", getIntent().getLongExtra("idArbol", 0));
        intent.putExtra("idEstadoDelArbol", id);
        startActivity(intent);
    }
}
