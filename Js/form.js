try {
    // password
    const pass_element = document.getElementById("pass_field");
    const see_pass = document.getElementById("see_pass");

    see_pass.addEventListener("click", e => {

        if (pass_element.type === "text") {
            pass_element.type = 'password';
        }
        else {
            pass_element.type = 'text';
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
        }
        else {
            confirm_pass_element.type = 'text';
        }
    })
    
} catch (error) {
}
