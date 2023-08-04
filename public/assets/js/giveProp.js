function giveProperties(itemId){
    let topProduct = document.getElementById('topProduct');
    let mayLike = document.getElementById('mayLike');
    let popular = document.getElementById('popular');
    let productId = itemId;
    let csrf = document.getElementsByName('_token')[0].value;
    if (topProduct.checked){
        topProduct = 1;
    }else{
        topProduct ='';
    }
    if (mayLike.checked){
        mayLike = 1;
    }else{
        mayLike = '';
    }
    if (popular.checked){
        popular = 1;
    }else{
        popular = '';
    }
    let formData = new FormData();
    formData.append("top", topProduct);
    formData.append("like", mayLike);
    formData.append("productId", productId);
    formData.append("popular", popular);
    formData.append("_token", csrf);
    fetch('/giveProp', {
        method: "post",
        body: formData
    }).then(response=>response.json())
        .then(result=>{
            console.log(result);
        });

}
