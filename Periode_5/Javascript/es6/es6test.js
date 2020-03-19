class vergadering {
    organiseren() {
        console.log('Organiseer vergadering');
    }    static verkrijgvergaderingdetails() {
        console.log("vergkrijg vergadering details");
    }
}class Techniekvergadering extends vergadering {
    organiseren() {
        //super.organise();
        console.log('Organiseer techniekvergadering');
        super.organiseren();
    }    static verkrijgvergaderingdetails() {
        console.log("verkrijg techniek vergadering ");
        super.verkrijgvergaderingdetails();
    }
}let js = new vergadering();js.organiseren();

Techniekvergadering.verkrijgvergaderingdetails();
