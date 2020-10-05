package com.unla.arbolado.modelo;

import android.content.ContentValues;

import com.unla.arbolado.SQLite.Contrato;

import java.io.Serializable;

public class Coordenada implements Serializable {

    private int idCoordenada;
    private String latitud;
    private String longitud;
    private String direccion;

    public Coordenada() {

    }

    public Coordenada(String latitud, String longitud) {
        this.latitud = latitud;
        this.longitud = longitud;
    }

    public Coordenada(String latitud, String longitud, String direccion) {
        this.latitud = latitud;
        this.longitud = longitud;
        this.direccion = direccion;
    }

    public Coordenada (int idCoordenada,String latitud, String longitud, String direccion) {
        this.latitud = latitud;
        this.longitud = longitud;
        this.direccion = direccion;
        this.idCoordenada = idCoordenada;
    }

    public Coordenada(int idCoordenada, String latitud, String longitud) {
        this.idCoordenada = idCoordenada;
        this.latitud = latitud;
        this.longitud = longitud;
    }

    public int getIdCoordenada() {
        return idCoordenada;
    }

    public void setIdCoordenada(int idCoordenada) {
        this.idCoordenada = idCoordenada;
    }

    public String getLatitud() {
        return latitud;
    }

    public void setLatitud(String latitud) {
        this.latitud = latitud;
    }

    public String getLongitud() {
        return longitud;
    }

    public void setLongitud(String longitud) {
        this.longitud = longitud;
    }

    public ContentValues toContentValues() {
        ContentValues values = new ContentValues();
        values.put(Contrato.CoordenadaEntry.LATITUD, latitud);
        values.put(Contrato.CoordenadaEntry.LONGITUD, longitud);
        values.put(Contrato.CoordenadaEntry.DIRECCION, direccion);
        return values;
    }


    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    @Override
    public String toString() {
        return "Coordenada{" +
                "idCoordenada=" + idCoordenada +
                ", latitud='" + latitud + '\'' +
                ", longitud='" + longitud + '\'' +
                ", direccion='" + direccion + '\'' +
                '}';
    }
}
