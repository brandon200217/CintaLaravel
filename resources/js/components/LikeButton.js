import Axios from 'axios';
import React, { useEffect,useState } from 'react'
import ReactDOM from 'react-dom';

export const LikeButton = ({cantidadLikes=0,idCinta,likes}) => {

    console.log(cantidadLikes.cantidadLikes);

    const BuscarlikeActual = () => {
        let ClaseLike;
        if(likes.likeUser){
            ClaseLike = "like-btn like-active";
        }else{
            ClaseLike = "like-btn";
        }
        return ClaseLike;
    }

    let LikeActual = BuscarlikeActual();

    const [likeState, likeSetstate] = useState({
        likeClass:LikeActual
        
    });

    const {likeClass} = likeState;

    useEffect(() => {
        
        return () => {
            console.log("Activando Componente");
        }
    }, [likeState])



    const LikeButton = () => {

        axios.post('/cintas/' + idCinta.idCinta)
        .then( (respuesta) =>   {
            
            if(likeClass == "like-btn"){
                
                likeSetstate({ 
                    likeClass:'like-btn like-active'
                })
            }
            
            else{
                likeSetstate({ 
                    likeClass:'like-btn'
                })
            }
        
        }).catch( error => {
            console.log(error);
        })

    }

    return (
        <>
            <div>
                {
                    <span className = {likeClass} onClick = { LikeButton}></span>
                }
            </div>
        </>
    )
}



if (document.getElementById('like')) {

    let cantidadLikes = document.getElementById("like").getAttribute("cantidadLikes");
    let idCinta = document.getElementById("like").getAttribute("id-Cinta");
    let likeUser = document.getElementById("like").getAttribute("likeUser");
    
    console.log(cantidadLikes);

    ReactDOM.render(<LikeButton cantidadLikes={{cantidadLikes}} idCinta = {{idCinta}} likes = {{likeUser}} />, document.getElementById('like'));
}


/*!likes.likeUser ? 
                    
<span className={'like-active' && likes.likeUser }></span>

: <span className="like-btn" onClick = { LikeButton}></span>*/