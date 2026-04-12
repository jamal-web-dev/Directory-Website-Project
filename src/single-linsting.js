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
}