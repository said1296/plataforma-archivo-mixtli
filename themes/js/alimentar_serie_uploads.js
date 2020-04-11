let db;
let dbVersion = 1;
let dbReady = false;

window.onload = function(){
    console.log("DOM content loaded");
    var el = document.getElementById("submit-fotos");
    if(el){
        el.addEventListener("submit", imageStore);
    }else{
        console.log("No se encontró, #submit-fotos");
    }

    var el = document.getElementById("descartar");
    if(el){
        el.addEventListener("click", imageDescartar);
    }else{
        console.log("No se encontró, #descartar");
    }
    initDb();
}

function initDb(){
    let request = indexedDB.open("stores", dbVersion);
    request.onerror = function(e){
        console.error("Unable to open database");
    }
    request.onsuccess = function(e){
        db = e.target.result;
        console.log("DB opened");
        var el = document.querySelector("#img-display");
        if(el){
            imageShow(el);
        }
    }
    request.onupgradeneeded = function(e){
        let db = e.target.result;
        db.createObjectStore("images", {keyPath:"id", autoIncrement: true});
        dbReady = true;
        console.log("Updated")
    }
}

function imageStore(e){
    console.log("Change event fired for #submit-fotos");
    let trans = db.transaction(["images"], "readwrite");
    let store = trans.objectStore("images");
    let req = store.clear();
    req.onsuccess = async function(){
        console.log("indexedDB vaciada");
        let files = await document.getElementById("img-files").files;
        for(var i=0; i<files.length;i++){
            result=await imagePush(i, files);
        }
    }
}

var imagePush = function(k, files){
    return new Promise(
        function(resolve,reject){
            let file = files[k];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                let bits = e.target.result;
                let ob = {
                    created: new Date(),
                    id_serie: window.location.search.substr(1).split("=")[1],
                    data: bits,
                    filename: files[k].name
                }
        
                let trans = db.transaction(["images"], "readwrite");
                let addReq = trans.objectStore("images").add(ob);
        
                addReq.onerror = function(e){
                    console.log("Error storing data");
                    console.error(e);
                }
        
                addReq.onsuccess = function(e){
                    console.log("Data stored ");
                    console.log(files.length-1,k);
                    if(k==(files.length-1)){
                        window.location = "detallar_item.php?idSerie=" + window.location.search.substr(1).split("=")[1];
                    }
                    resolve("se subio");
                }
            }
        }
    )
}

async function imageDescartar(e){
    console.log("Change event fired for #descartar");
    imageDelete();
}

function imageDelete(){
    console.log("Deleting image...");

    let trans = db.transaction(["images"], "readwrite");
    let store = trans.objectStore("images");
    let req = store.openCursor();

    req.onsuccess = function(e){
        console.log("Cursor abierto")
        let cursor = e.target.result;
        var request = cursor.delete();
        request.onsuccess = function(){
            console.log("Borrado");
            var request_count = store.count();
            request_count.onsuccess = function(){
                console.log("Datos contados");
                datosCount = request_count.result;
                console.log(datosCount);
                if(datosCount>0){
                    window.location="detallar_item.php?idSerie=" + cursor.value.id_serie;
                }else{
                    window.location="sesion.php";
                }
            }

        }
    }
}

function imageShow(image){
    console.log("Showing image...");

    let trans = db.transaction(["images"], "readonly");
    let store = trans.objectStore("images");
    let req = store.openCursor();

    req.onsuccess = function(e){
        let record = e.target.result.value;
        if (record){
            image.src = record.data;
            document.getElementById("img").value = record.data;
            document.getElementById("filename").value = record.filename;
        }else{
            return null;
        }
    }
}