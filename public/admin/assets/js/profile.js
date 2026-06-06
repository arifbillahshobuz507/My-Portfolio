
async function profileData(){
    userName = document.getElementById("userName").innerHTML="jes";
    userName = document.getElementById("userFullName").innerHTML="kos";
    const response = await axios.get('api/user-profile');
    console.log(response.data.data.email);
} 
profileData();