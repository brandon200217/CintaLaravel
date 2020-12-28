import React, { useEffect } from 'react'
import ReactDOM from 'react-dom';

export const EliminarCriticas = (id) => {

    useEffect(() => {
        
       
    }, [id])
    
    
    return (
        <div className="section">
            
            <input type="submit"  value="Eliminar" 
            className="btn-eliminar  btn-danger w-80 d-block  mr-1" />
        </div>
    )

}

if (document.getElementById('eliminar-critica')) {
   
    let data = document.getElementById("eliminar-critica").getAttribute("cinta-id");

    ReactDOM.render(<EliminarCriticas id = {data}/>, document.getElementById('eliminar-critica'));
}