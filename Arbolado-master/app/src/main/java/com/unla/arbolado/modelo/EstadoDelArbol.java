package com.unla.arbolado.modelo;

import android.content.ContentValues;

import com.unla.arbolado.SQLite.Contrato;

import java.io.Serializable;

public class EstadoDelArbol implements Serializable {

    private int idEstadoDelArbol;
    private String estadoSanitario;
    private String inclinacion;
    private String ahuecamiento;
    private String cables;
    private String luminaria;
    private String daños;
    private String veredas;
    private String podas;

    private String raices;
    private String superficieAfectada;
    private String afecto;



    public EstadoDelArbol() {

    }

    public EstadoDelArbol(String estadoSanitario, String inclinacion, String ahuecamiento, String cables, String luminaria, String daños, String veredas, String podas,String raices, String superficieAfectada,String afecto) {
        this.estadoSanitario = estadoSanitario;
        this.inclinacion = inclinacion;
        this.ahuecamiento = ahuecamiento;
        this.cables = cables;
        this.luminaria = luminaria;
        this.daños = daños;
        this.veredas = veredas;
        this.podas = podas;
        this.raices = raices;
        this.superficieAfectada = superficieAfectada;
        this.afecto = afecto;
    }

    public EstadoDelArbol(int idEstadoDelArbol, String estadoSanitario, String inclinacion, String ahuecamiento, String cables, String luminaria, String daños, String veredas, String podas,String raices, String superficieAfectada,String afecto) {
        this.idEstadoDelArbol = idEstadoDelArbol;
        this.estadoSanitario = estadoSanitario;
        this.inclinacion = inclinacion;
        this.ahuecamiento = ahuecamiento;
        this.cables = cables;
        this.luminaria = luminaria;
        this.daños = daños;
        this.veredas = veredas;
        this.podas = podas;
        this.raices = raices;
        this.superficieAfectada = superficieAfectada;
        this.afecto = afecto;
    }

    public int getIdEstadoDelArbol() {
        return idEstadoDelArbol;
    }

    public void setIdEstadoDelArbol(int idEstadoDelArbol) {
        this.idEstadoDelArbol = idEstadoDelArbol;
    }

    public String getEstadoSanitario() {
        return estadoSanitario;
    }

    public void setEstadoSanitario(String estadoSanitario) {
        this.estadoSanitario = estadoSanitario;
    }

    public String getInclinacion() {
        return inclinacion;
    }

    public void setInclinacion(String inclinacion) {
        this.inclinacion = inclinacion;
    }

    public String getAhuecamiento() {
        return ahuecamiento;
    }

    public void setAhuecamiento(String ahuecamiento) {
        this.ahuecamiento = ahuecamiento;
    }

    public String getCables() {
        return cables;
    }

    public void setCables(String cables) {
        this.cables = cables;
    }

    public String getLuminaria() {
        return luminaria;
    }

    public void setLuminaria(String luminaria) {
        this.luminaria = luminaria;
    }

    public String getDaños() {
        return daños;
    }

    public void setDaños(String daños) {
        this.daños = daños;
    }

    public String getVeredas() {
        return veredas;
    }

    public void setVeredas(String veredas) {
        this.veredas = veredas;
    }

    public String getPodas() {
        return podas;
    }

    public void setPodas(String podas) {
        this.podas = podas;
    }


    public String getRaices() {
        return raices;
    }

    public void setRaices(String raices) {
        this.raices = raices;
    }

    public String getSuperficieAfectada() {
        return superficieAfectada;
    }

    public void setSuperficieAfectada(String superficieAfectada) {
        this.superficieAfectada = superficieAfectada;
    }

    public String getAfecto() {
        return afecto;
    }

    public void setAfecto(String afecto) {
        this.afecto = afecto;
    }

    public ContentValues toContentValues() {
        ContentValues values = new ContentValues();
        values.put(Contrato.EstadoDelArbolEntry.ESTADO_SANITARIO, estadoSanitario);
        values.put(Contrato.EstadoDelArbolEntry.INCLINACION, inclinacion);
        values.put(Contrato.EstadoDelArbolEntry.AHUECAMIENTO, ahuecamiento);
        values.put(Contrato.EstadoDelArbolEntry.CABLES, cables);
        values.put(Contrato.EstadoDelArbolEntry.LUMINARIA, luminaria);
        values.put(Contrato.EstadoDelArbolEntry.DAÑOS, daños);
        values.put(Contrato.EstadoDelArbolEntry.VEREDAS, veredas);
        values.put(Contrato.EstadoDelArbolEntry.PODAS, podas);
        values.put(Contrato.EstadoDelArbolEntry.RAICES, raices);
        values.put(Contrato.EstadoDelArbolEntry.SUPERFICIE_AFECTADA, superficieAfectada);
        values.put(Contrato.EstadoDelArbolEntry.AFECTO, afecto);
        return values;
    }


    @Override
    public String toString() {
        return "EstadoDelArbol{" +
                "idEstadoDelArbol=" + idEstadoDelArbol +
                ", estadoSanitario='" + estadoSanitario + '\'' +
                ", inclinacion='" + inclinacion + '\'' +
                ", ahuecamiento='" + ahuecamiento + '\'' +
                ", cables='" + cables + '\'' +
                ", luminaria='" + luminaria + '\'' +
                ", daños='" + daños + '\'' +
                ", veredas='" + veredas + '\'' +
                ", podas='" + podas + '\'' +
                ", raices='" + raices + '\'' +
                ", superficieAfectada='" + superficieAfectada + '\'' +
                ", afecto='" + afecto + '\'' +
                '}';
    }
}
