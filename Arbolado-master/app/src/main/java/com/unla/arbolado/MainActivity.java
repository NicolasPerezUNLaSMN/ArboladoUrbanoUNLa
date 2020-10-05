package com.unla.arbolado;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

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


    public void irAWeb(View v) {
        Uri uri = Uri.parse("https://unla-arbolado-urbano.000webhostapp.com//");
        Intent intent = new Intent(Intent.ACTION_VIEW, uri);
        startActivity(intent);
    }

    public void verRegistros(View view) {
        Intent intent = new Intent(this, RegistrosActivity.class);
        startActivity(intent);

    }



    @SuppressLint("NewApi")
    public void onBackPressed() {
        super.onBackPressed();
        finishAffinity();
        System.exit(0);
    }
}
