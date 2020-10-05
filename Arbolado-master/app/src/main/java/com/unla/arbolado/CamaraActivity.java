package com.unla.arbolado;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.core.content.FileProvider;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.media.MediaScannerConnection;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.unla.arbolado.SQLite.CensoSQLite;
import com.unla.arbolado.modelo.Censo;

import java.io.File;
import java.io.IOException;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.List;

public class CamaraActivity extends AppCompatActivity {

    private ImageView img;

    private List<Censo> censos;

    private Button bt_hacerfoto;

    private Bitmap bMap;
    ImageView ivFoto;

    int contador = 0 ;

    final int COD_FOTO = 20;
    final String CARPETA_RAIZ = "Arbo";
    final String CARPETA_IMAGENES = "lado";
    final String RUTA_IMAGEN = CARPETA_RAIZ + CARPETA_IMAGENES;
    String path;

    private String nombreFoto;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_camara);


        censos = CensoSQLite.getInstance(this).traer(this);
        final Censo ultimoCenso = censos.get(censos.size()-1);
        nombreFoto = "reg_"+ultimoCenso.getIdCenso() +"_";
        Log.d("foto a guardar---->", nombreFoto);

        img = findViewById(R.id.img);
        ivFoto = findViewById(R.id.ivFoto);
        bt_hacerfoto = this.findViewById(R.id.btn_camara);


        // PERMISOS PARA ANDROID 6 O SUPERIOR
        if(ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA)
                != PackageManager.PERMISSION_GRANTED) {

            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CAMERA, Manifest.permission.WRITE_EXTERNAL_STORAGE}, 0);

        }


        //Añadimos el Listener Boton
        bt_hacerfoto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {



                tomarFoto();
                  }



        });



    }//cierra el oncreate




    public void tomarFoto() {
        String nombreImagen = nombreFoto+fechaCorta(new GregorianCalendar());;
        Log.d(nombreImagen, "----tomarFoto: ");

        File fileImagen = new File(Environment.getExternalStorageDirectory(), RUTA_IMAGEN);

        boolean isCreada = fileImagen.exists();

        if(isCreada == false) {
            isCreada = fileImagen.mkdirs();
        }

        if(isCreada == true) {
            nombreImagen = nombreImagen+ ".png";
            contador++;
        }

        path = Environment.getExternalStorageDirectory()+File.separator+RUTA_IMAGEN+File.separator+nombreImagen;
        File imagen = new File(path);

        Intent intent = null;
        intent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);

        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N) {
            String authorities = this.getPackageName()+".provider";
            Uri imageUri = FileProvider.getUriForFile(this, authorities, imagen);
            intent.putExtra(MediaStore.EXTRA_OUTPUT, imageUri);
        } else {
            intent.putExtra(MediaStore.EXTRA_OUTPUT, Uri.fromFile(imagen));
        }
        startActivityForResult(intent, COD_FOTO);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if(resultCode == RESULT_OK) {
            switch (requestCode) {
                case COD_FOTO:
                    MediaScannerConnection.scanFile(this, new String[]{path}, null, new MediaScannerConnection.OnScanCompletedListener() {
                        @Override
                        public void onScanCompleted(String path, Uri uri) {

                        }
                    });

                    Bitmap bitmap = BitmapFactory.decodeFile(path);
                    ivFoto.setImageBitmap(bitmap);

                    break;
            }
        }
    }



    public void continuar(View view) {


        if(contador>0) {
            Intent intent = new Intent(this, MainActivity.class);
            startActivity(intent);
        }else{

            Toast.makeText(this, "UPPPS....Debe sacar una foto como mínimo!!!!", Toast.LENGTH_SHORT).show();

        }
    }


    String fechaCorta(GregorianCalendar fecha){

        String retorno;

        retorno = fecha.get(Calendar.YEAR)+"-"+fecha.get(Calendar.MONTH)+"-"+
                fecha.get(Calendar.DAY_OF_MONTH)+"-"+fecha.get(Calendar.HOUR_OF_DAY)+"-"+
                fecha.get(Calendar.MINUTE)+"-"+fecha.get(Calendar.SECOND);


        return retorno;


    }

}
