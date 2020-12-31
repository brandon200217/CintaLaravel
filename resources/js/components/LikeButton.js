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
        likeClass:LikeActual,
        likesUser:cantidadLikes.cantidadLikes,
    });

    const {likeClass,likesUser} = likeState;


    useEffect(() => {
        
        return () => {
            console.log("Activando Componente");
        }
    }, [likeState,likesUser])

    useEffect(() => {
        
        return () => {
            console.log("Activando Componente likes");
        }
    }, [likesUser])

    const LikeButton = () => {

        axios.post('/cintas/' + idCinta.idCinta)
        .then( (respuesta) =>   {

            if(likeClass == "like-btn"){
                
                likeSetstate({ 
                    likeClass:'like-btn like-active',
                    likesUser:parseInt(likesUser)+1
                })
            }
            
            else{
                likeSetstate({ 
                    likeClass:'like-btn',
                    likesUser:likesUser-1
                })
            }
        
        }).catch( error => {
            if(error.response.status === 401){

                window.location = '/register';

            }
        })

    }

    return (
        <>
            <div className=" justify-content-center text-center">
                
                    <span className = {likeClass} onClick = { LikeButton}></span>
                    <p>{likesUser} personas les gusto esta critica</p>
            </div>
        </>
    )
}



if (document.getElementById('like')) {

    let cantidadLikes = document.getElementById("like").getAttribute("cantidadLikes");
    let idCinta = document.getElementById("like").getAttribute("id-Cinta");
    let likeUser = document.getElementById("like").getAttribute("likeUser");


    ReactDOM.render(<LikeButton cantidadLikes={{cantidadLikes}} idCinta = {{idCinta}} likes = {{likeUser}} />, document.getElementById('like'));
}


/*!likes.likeUser ? 
                    
<span className={'like-active' && likes.likeUser }></span>

: <span className="like-btn" onClick = { LikeButton}></span>*/