const params = new URLSearchParams(window.location.search);
const id = Number(params.get("id"));

async function fetchListingData(){
  try{
    const response = await fetch("../global_business_directory.json");
    const data = await response.json();
    getCardInfo(data)
  } catch(error){
    console.log(error);
  }
}
fetchListingData();
console.log(id);

function getCardInfo(data){
  let info = data.find((card)=> card.id === id);
  console.log(info)
  const listingImage = JSON.parse(localStorage.getItem("listinImage"));
  console.log(listingImage);
  renderInfoToPage(info, listingImage);
}
function renderInfoToPage(info, listingImage){
  const busSection = document.querySelector(".heading-section");
  const busName = document.querySelector(".heading-section h2");
  const busAddress = document.querySelector(".heading-section .address");
  const busRating = document.querySelector(".heading-section .rating-star");
  const busDescription = document.querySelector(".content");
  const busEmail = document.querySelectorAll(".busEmail");
  const busPhone = document.querySelectorAll(".busPhone");
  const busWeb = document.querySelectorAll(".busWeb");

  
  busEmail.forEach(box => box.textContent = info.email );
  busPhone.forEach(box => box.textContent = info.phone);
  busWeb.forEach(box => box.textContent = `www.${info.category}.com`);
  busSection.setAttribute("style", `background-image: linear-gradient(rgba(0, 0, 0, 0.145), rgba(0, 0, 0, 0.824)), url(${listingImage})`);
  busName.textContent = info.name;
  busAddress.textContent = info.location;
  busRating.innerHTML = generateRatingStarImage(info.rating)
  busDescription.innerHTML = `
    <p>${info.name} is a leading name in the ${info.category} industry, offering reliable and high-quality solutions tailored to meet modern needs. At ${info.name}, customers can expect a wide range of services. all delivered with attention to detials and a commitment to excellence. 
      <br>
      <br>
      Known for its dedication to customer satisfaction, ${info.name} combines expertise, innovation and professionalism to deliver outstanding results every time. Whether you're a first-time customer or a returning client, ${info.name}  is committed to providing  a seamless and stisfying experience. 
        <br>
        Get in touch with ${info.name} today and discover a better way to meet your ${info.category} needs.
    </p>
  `;

}
function generateRatingStarImage(rating){
    const fullStars = Math.round(rating);
    let starsHtml = '';
    for(let i = 0; i<5; i++){
        if(i<fullStars){
            starsHtml += `<img src="../images/Index-Images/rating-fill-star.png" alt="">`;
        }else {
            starsHtml += `<img src="../images/Index-Images/rating-empy-star.png" class="empty-star"> `;
        }
    }

    return starsHtml;
}