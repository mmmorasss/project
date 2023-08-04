function del(form) {
    let cartId = form.dataset.cartId;
    let csrf = document.getElementsByName('_token')[0].value;
    if (window.confirm("are you sure you want to remove an item from the shopping cart?")){
        let formData = new FormData();
        formData.append("_token", csrf);
        formData.append("cartId", cartId);
        fetch('/deleteCartItem',{
            method: "post",
            body: formData
        }).then(response=>response.json())
            .then(result=>{
                if (result = 'success'){
                    console.log(result);
                    let element = document.getElementById(cartId);
                    element.remove();
                }else{
                    alert("Something went wrong. Try again later");
                }
            })
    }
}

let csrf = document.getElementsByName('_token')[0].value;
function changeStatus(statusSelector){
    let status = (statusSelector.value)
    let cartId = statusSelector.dataset.cartId;
    let formData = new FormData();
    formData.append("_token", csrf);
    formData.append("cartId", cartId);
    formData.append("status", status);
    fetch('/changeStatus', {
        method: "post",
        body: formData
    }).then(response=>response.json())
        .then(result=>{
            console.log(result);
        })
}
