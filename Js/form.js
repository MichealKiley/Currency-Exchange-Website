try {
    // password
    const pass_element = document.getElementById("pass_field");
    const see_pass = document.getElementById("see_pass");


    see_pass.addEventListener("click", e => {

        if (pass_element.type === "text") {
            pass_element.type = 'password';
            see_pass.className = "bx bxs-key";
        }
        else {
            pass_element.type = 'text';
            see_pass.className = "bx bx-low-vision";
        }
    })

} catch (error) {
}


try {
    // confirm password
    const confirm_pass_element = document.getElementById("confirm_pass_field");
    const confirm_see_pass = document.getElementById("confirm_see_pass");

    confirm_see_pass.addEventListener("click", e => {

        if (confirm_pass_element.type === "text") {
            confirm_pass_element.type = 'password';
            confirm_see_pass.className = "bx bxs-key";
        }
        else {
            confirm_pass_element.type = 'text';
            confirm_see_pass.className = "bx bx-low-vision";
        }
    })
    
} catch (error) {
}
