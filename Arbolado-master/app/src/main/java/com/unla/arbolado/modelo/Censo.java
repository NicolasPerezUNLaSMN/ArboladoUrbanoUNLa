package com.unla.arbolado.modelo;

import android.content.ContentValues;
import android.os.Environment;
import android.util.Log;

import com.unla.arbolado.SQLite.Contrato;

import java.io.File;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.GregorianCalendar;
import java.util.List;


public class Censo implements Serializable {

    private int idCenso;
    private Usuario usuario;
    private Calle calle;
    private Arbol arbol;
    private EstadoDelArbol estadoDelArbol;
    private Coordenada coordenada;

    public Censo() {

    }

    public Censo(Usuario usuario, Calle calle, Arbol arbol, EstadoDelArbol estadoDelArbol, Coordenada coordenada) {
        this.usuario = usuario;
        this.calle = calle;
        this.arbol = arbol;
        this.estadoDelArbol = estadoDelArbol;
        this.coordenada = coordenada;
    }

    public Censo(int idCenso, Usuario usuario, Calle calle, Arbol arbol, EstadoDelArbol estadoDelArbol, Coordenada coordenada) {
        this.idCenso = idCenso;
        this.usuario = usuario;
        this.calle = calle;
        this.arbol = arbol;
        this.estadoDelArbol = estadoDelArbol;
        this.coordenada = coordenada;
    }




    public int getIdCenso() {
        return idCenso;
    }

    public void setIdCenso(int idCenso) {
        this.idCenso = idCenso;
    }

    public Usuario getUsuario() {
        return usuario;
    }

    public void setUsuario(Usuario usuario) {
        this.usuario = usuario;
    }

    public Calle getCalle() {
        return calle;
    }

    public void setCalle(Calle calle) {
        this.calle = calle;
    }

    public Arbol getArbol() {
        return arbol;
    }

    public void setArbol(Arbol arbol) {
        this.arbol = arbol;
    }

    public EstadoDelArbol getEstadoDelArbol() {
        return estadoDelArbol;
    }

    public void setEstadoDelArbol(EstadoDelArbol estadoDelArbol) {
        this.estadoDelArbol = estadoDelArbol;
    }

    public Coordenada getCoordenada() {
        return coordenada;
    }

    public void setCoordenada(Coordenada coordenada) {
        this.coordenada = coordenada;
    }



    public ContentValues toContentValues() {
        ContentValues values = new ContentValues();
        values.put(Contrato.CensoEntry.USUARIO, usuario.getIdUsuario());
        values.put(Contrato.CensoEntry.CALLE, calle.getIdCalle());
        values.put(Contrato.CensoEntry.ARBOL, arbol.getIdArbol());
        values.put(Contrato.CensoEntry.ESTADO_DEL_ARBOL, estadoDelArbol.getIdEstadoDelArbol());
        values.put(Contrato.CensoEntry.COORDENADA, coordenada.getIdCoordenada());
        return values;
    }


    @Override
    public String toString() {
        return "Censo{" +
                "idCenso=" + idCenso +
                ", usuario=" + usuario +
                ", calle=" + calle +
                ", arbol=" + arbol +
                ", estadoDelArbol=" + estadoDelArbol +
                ", coordenada=" + coordenada +
                '}';
    }



    public int cantidadDeFotosParaEnviar(){


        final String CARPETA_RAIZ = "Arbo";
        final String CARPETA_IMAGENES = "lado";
        final String RUTA_IMAGEN = CARPETA_RAIZ + CARPETA_IMAGENES;



        //Lista de imagenes que aun no se subieron
        List<String> list = new ArrayList<String>();

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

            if ((fileImagen + File.separator + direccion).contains("reg_" + idCenso + "_")) {

                Log.d("PARA ENVIAR: ", fileImagen + File.separator + direccion);
                fotosASubir.add(fileImagen + File.separator + direccion);
            }

        }

        return fotosASubir.size();

    }




    public void eliminarFotosLuegoDeEnviar(){


        final String CARPETA_RAIZ = "Arbo";
        final String CARPETA_IMAGENES = "lado";
        final String RUTA_IMAGEN = CARPETA_RAIZ + CARPETA_IMAGENES;



        //Lista de imagenes que aun no se subieron
        List<String> list = new ArrayList<String>();

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

            if ((fileImagen + File.separator + direccion).contains("reg_" + idCenso + "_")) {

                Log.d("PARA ENVIAR: ", fileImagen + File.separator + direccion);
                fotosASubir.add(fileImagen + File.separator + direccion);



            }

        }

        for(String f: fotosASubir){
            File fileParaBorrar = new File(f);
            fileParaBorrar.delete();
        }



    }


}
