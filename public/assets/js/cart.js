function changeQuantity(action, btn){
    let quantity;
    let quantity1;
    if (action === 'plus') {
        quantity = btn.previousElementSibling;
        quantity.innerText = +quantity.innerText + 1;
    } else {
        quantity1 = btn.previousElementSibling;
        quantity = quantity1.previousElementSibling;
        if (quantity.innerText <= '1') return;
        quantity.innerText = +quantity.innerText - 1;
    }
    let total = quantity.dataset.cost * quantity.innerText - quantity.dataset.ship +  quantity.dataset.ship*2;
    let cartId = quantity.dataset.itemId; //id товара в корзине
    let totalBlock = document.getElementById('total_'+cartId);
    totalBlock.innerText = total+'₽';
    calcSubtotal();
    // Запрос серверу на изменение колва товара в корзине
    let csrf = document.getElementsByName('_token')[0].value;

    let formData = new FormData();
    formData.append("cartId", cartId);
    formData.append("quantity", quantity.innerText);
    formData.append("_token", csrf);
    fetch('/changeQuantity', {
        method: "post",
        body: formData
    }).then(response=>response.json())
        .then(result=>{
            console.log(result);
        });
}
function  calcSubtotal(){
    let subtotal = document.getElementById('subtotal');
    let totals = document.querySelectorAll('[id^="total_"]');
    let subtotalValue = 0;
    totals.forEach(totalBlock=>{
        subtotalValue = subtotalValue + Number(totalBlock.innerText.replace('₽', ''));
    });
    subtotal.innerText = subtotalValue+'₽';

}
calcSubtotal();
