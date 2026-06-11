async function profileData() {
    const userName = document.querySelectorAll(".user-name"); 
    const userPhone = document.getElementById("userPhone");
    const userEmail = document.getElementById("userEmail");
    const userImage = document.getElementById("userImage");
    const userLogo = document.getElementById("userLogo");

    try {
        const result = await axios.get('/api/user-profile');
        console.log("result", result);
        
        const userData = result.data.data;
        const userProfile = result.data.data.profile;
        
        console.log('user_data', userData);
        console.log('user_profile_data', userProfile);
        
        if (userData && userProfile !== null) {
            const image = userProfile.image;
            const logo = userProfile.logo;
            
            if (userProfile && image) {
                userImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${image}`;
            }
            if (userProfile && logo) {
                userLogo.src = `http://127.0.0.1:8000/admin/assets/img/profile/${logo}`;
            }
        }
        
        if (userName && userData) {
            userName.forEach(element => {
                element.textContent = userData.title;
            });
        } else {
            console.log('userName element not found or userData missing');
        }
        
        if (userPhone && userData) {
            userPhone.textContent = userData.phone;
        }
        
        if (userEmail && userData) {
            userEmail.textContent = userData.email;
        }

    } catch (error) {
        console.log("Full error object:", error);
        // ... আপনার error handling কোড
    }
}

profileData();