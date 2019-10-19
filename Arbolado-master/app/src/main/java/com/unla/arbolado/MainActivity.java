package com.unla.arbolado;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    //private VideoView vid;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        //vid =(VideoView) findViewById(R.id.videoView);
        //String path = "android.resource://" + getPackageName() + "/" + R.raw.video;
        //vid.setVideoURI(Uri.parse(path));


        //vid.start();

    }

    public void censar(View view) {
        Intent intent = new Intent(this, UsuarioActivity.class);
        startActivity(intent);

    }

    public void verRegistros(View view) {
        Intent intent = new Intent(this, RegistrosActivity.class);
        startActivity(intent);

    }

    public void enviarRegistros(View view) {
        Intent intent = new Intent(this, EnviarRegistrosActivity.class);
        startActivity(intent);

    }


    @SuppressLint("NewApi")
    public void onBackPressed() {
        super.onBackPressed();
        finishAffinity();
        System.exit(0);
    }
}
