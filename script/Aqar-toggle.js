const detailsElements = document.querySelectorAll('.toggledetails');
detailsElements.forEach((details) => {
    const icon = details.querySelector('.icon');
    details.addEventListner("toggle",()=>{
        icon.textContent=details.open ? '+':'-';
    });
});