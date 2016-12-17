$.validator.addMethod(
    "mexicanDate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d{4}-(0[1-9]|1[0-2])-([0-2][1-9]|3[01])$/g);
    },
    "Por favor ingrese una fecha en el formato aaaa-mm-dd"
);