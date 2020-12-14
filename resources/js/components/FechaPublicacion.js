import React, { Component } from 'react';
import ReactDOM from 'react-dom';


export const FechaPublicacion = (fecha) => {
    
    return moment(fecha.fecha).locale("es").format('DD [de] MMMM [del] YYYY');
    
}


if (document.getElementById('componente')) {
    
    let data = document.getElementById("componente").getAttribute("data");

    ReactDOM.render(<FechaPublicacion fecha = {data}/>, document.getElementById('componente'));
}