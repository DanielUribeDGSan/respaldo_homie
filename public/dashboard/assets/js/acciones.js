db.collection("col-sala")
    .doc("novo")
    .collection("col-videos").doc("videoTipo1")
    .onSnapshot((querySnapshot) => {
        const arrData = querySnapshot.Df.sn.proto.mapValue.fields.videosR.mapValue.fields.videos.arrayValue.values;
        arrData.map(function(data) {
            console.log(data.stringValue);
        });
    });



const subirVieo = () => {
    const urlVideo = document.querySelector("#urlVideo");
    const titulo = document.querySelector("#titulo");
    const nombre = document.querySelector("#nombre");
    const tipoVideo = document.querySelector("#tipoVideo");

    if (tipoVideo.value == "1") {
        let arrT1 = "";
        let tituloT1 = "";
        let nombreT1 = "";

        const videoRef = db.collection("col-sala")
            .doc("novo")
            .collection("col-videos").doc("videoTipo1");
        videoRef.get().then((doc) => {
            if (doc.exists) {
                arrT1 = doc.data().videosR.videos;
                arrT1.push(urlVideo.value);
                tituloT1 = doc.data().videosR.titulos;
                tituloT1.push(titulo.value);
                nombreT1 = doc.data().videosR.nombres;
                nombreT1.push(nombre.value);

                const videosR = {
                    videos: arrT1,
                    titulos: tituloT1,
                    nombres: nombreT1
                };
                sendVideo(videosR, "videoTipo1");
            } else {
                console.log("No such document!");
                arrT1 = [];
                arrT1.push(urlVideo.value);
                tituloT1 = [];
                tituloT1.push(titulo.value);
                nombreT1 = [];
                nombreT1.push(nombre.value);

                const videosR = {
                    videos: arrT1,
                    titulos: tituloT1,
                    nombres: nombreT1
                };
                sendVideo(videosR, "videoTipo1");
            }
        }).catch((error) => {
            console.log("Error getting document:", error);
        });

    } else if (tipoVideo.value == "2") {
        let arrT2 = "";
        let tituloT2 = "";
        let nombreT2 = "";

        const videoRef = db.collection("col-sala")
            .doc("novo")
            .collection("col-videos").doc("videoTipo2");
        videoRef.get().then((doc) => {
            if (doc.exists) {
                arrT2 = doc.data().videosR.videos;
                arrT2.push(urlVideo.value);
                tituloT2 = doc.data().videosR.titulos;
                tituloT2.push(titulo.value);
                nombreT2 = doc.data().videosR.nombres;
                nombreT2.push(nombre.value);

                const videosR = {
                    videos: arrT2,
                    titulos: tituloT2,
                    nombres: nombreT2
                };
                sendVideo(videosR, "videoTipo2");
            } else {
                console.log("No such document!");
                arrT2 = [];
                arrT2.push(urlVideo.value);
                tituloT2 = [];
                tituloT2.push(titulo.value);
                nombreT2 = [];
                nombreT2.push(nombre.value);

                const videosR = {
                    videos: arrT2,
                    titulos: tituloT2,
                    nombres: nombreT2
                };
                sendVideo(videosR, "videoTipo2");
            }
        }).catch((error) => {
            console.log("Error getting document:", error);
        });

    } else if (tipoVideo.value == "3") {
        let arrT3 = "";
        let tituloT3 = "";
        let nombreT3 = "";

        const videoRef = db.collection("col-sala")
            .doc("novo")
            .collection("col-videos").doc("videoTipo3");
        videoRef.get().then((doc) => {
            if (doc.exists) {
                arrT3 = doc.data().videosR.videos;
                arrT3.push(urlVideo.value);
                tituloT3 = doc.data().videosR.titulos;
                tituloT3.push(titulo.value);
                nombreT3 = doc.data().videosR.nombres;
                nombreT3.push(nombre.value);


                const videosR = {
                    videos: arrT3,
                    titulos: tituloT3,
                    nombres: nombreT3
                };
                sendVideo(videosR, "videoTipo3");
            } else {
                console.log("No such document!");
                arrT3 = [];
                arrT3.push(urlVideo.value);
                tituloT3 = [];
                tituloT3.push(titulo.value);
                nombreT3 = [];
                nombreT3.push(nombre.value);

                const videosR = {
                    videos: arrT3,
                    titulos: tituloT3,
                    nombres: nombreT3
                };
                sendVideo(videosR, "videoTipo3");
            }
        }).catch((error) => {
            console.log("Error getting document:", error);
        });

    } else if (tipoVideo.value == "4") {
        let arrT4 = "";
        let tituloT4 = "";
        let nombreT4 = "";

        const videoRef = db.collection("col-sala")
            .doc("novo")
            .collection("col-videos").doc("videoTipo4");
        videoRef.get().then((doc) => {
            if (doc.exists) {
                arrT4 = doc.data().videosR.videos;
                arrT4.push(urlVideo.value);
                tituloT4 = doc.data().videosR.titulos;
                tituloT4.push(titulo.value);
                nombreT4 = doc.data().videosR.nombres;
                nombreT4.push(nombre.value);


                const videosR = {
                    videos: arrT4,
                    titulos: tituloT4,
                    nombres: nombreT4
                };
                sendVideo(videosR, "videoTipo4");
            } else {
                console.log("No such document!");
                arrT4 = [];
                arrT4.push(urlVideo.value);
                tituloT4 = [];
                tituloT4.push(titulo.value);
                nombreT4 = [];
                nombreT4.push(nombre.value);

                const videosR = {
                    videos: arrT4,
                    titulos: tituloT4,
                    nombres: nombreT4
                };
                sendVideo(videosR, "videoTipo4");
            }
        }).catch((error) => {
            console.log("Error getting document:", error);
        });

    }
}

const sendVideo = (videosR, tipo) => {
    return new Promise((resolve, reject) => {
        db.collection("col-sala")
            .doc("novo")
            .collection("col-videos")
            .doc(tipo)
            .set({
                videosR
            })
            .then(function(docRef) {
                resolve(videosR);
                document.getElementById("urlVideo").value = "";
                document.getElementById("titulo").value = "";
                document.getElementById("nombre").value = "";
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener("mouseenter", Swal.stopTimer);
                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: "Video enviado",
                });
            })
            .catch(function(error) {
                reject(error);
            });
    });
}