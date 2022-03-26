const myInput = document.getElementById("InputOrario");

if(myInput.value == "" || myInput.value == null)
{
    flatpickr(myInput,
        {
            enableTime: true,
            minDate: "today",
            defaultDate: "today",
        });
}
else
{
    flatpickr(myInput,
        {
            enableTime: true,
            minDate: "today",
        });
}
