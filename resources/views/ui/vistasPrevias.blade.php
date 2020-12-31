<div class="col-md-4 mt-4">
                            <div class="card shadow" >
                                <a href="{{route('cintas.show', ['cinta' =>$cinta->id])}}">
                                    <img class="card-img-top" src="/storage/{{$cinta->imagen}}" alt="imagen cinta">
                                </a>
                                <div class="card-body">
                                    <h3 class="card-title text-center">{{$cinta->Titulo}}</h3>
                                    <div class="meta-cinta d-flex justify-content-between">
                                        
                                        @php
                                            $fechaPublicacion = $cinta->created_at;
                                        @endphp
                                        <p class="text-primary fecha font-weight-light">
                                            {{Str::substr($fechaPublicacion,0,10)}}    
                                        </p>
                                        <p class="text-primary fecha font-weight-light">
                                            {{count($cinta->likesCinta)}} les gusto</p>
                                       

                                    </div>
                                    <p> {{Str::limit(strip_tags(Str::title($cinta->Analisis)), 108 ,' continuar leyendo...')}}</p>
                                    <a href="{{route('cintas.show', ['cinta' =>$cinta->id])}}" class="btn btn-primary d-block  font-weight-bold text-uppercase">Ver Critica</a>
                                </div>
                            </div>
                        </div>  