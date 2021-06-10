# API de cartas españolas

API que devuelve de a una las cartas españolas

Entrevera un mazo de cartas españolas y las devuelve de a una.

Publicado en [Vercel](https://cartasapi.vercel.app/)

Tiene como inconveniente  que la sesión por ser serverlees dura poco tiempo, y se pierde el mazo

### Petición HTTP:
https://cartasapi.vercel.app/iniciarMazo

Devuelve:
```JSON
{
  "Message" : "Mazo iniciado con exito", 
  "ID" : "b76bae9515bb1629cd87eff5fb3d6c7a"
}
```

https://cartasapi.vercel.app/darCarta/[ID]

Devuelve:
```JSON
{
    "restan": 47,
    "carta": {
        "palo": "basto",
        "numero": 3,
        "img": "https://acmolino.github.io/recursos/cartas-img/basto/3.png"
    }
}
```

Las imagenes de las cartas y el algoritmo de armado fue provisto por [Nicolas Artigas](https://github.com/nicolasArtigas)
