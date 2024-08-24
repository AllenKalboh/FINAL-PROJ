
function changeQuantity(button, change) {
    const input = button.parentElement.querySelector('.quantity-input');
    let value = parseInt(input.value);
    value = Math.max(1, value + change); // Ensure quantity is at least 1
    input.value = value;
    document.getElementById('edit-quantity-btn').disabled = false;
}

document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('input', function() {
        document.getElementById('edit-quantity-btn').disabled = false;
    });
});
