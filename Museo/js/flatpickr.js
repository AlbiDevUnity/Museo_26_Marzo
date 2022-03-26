var myInput = document.getElementById("InputOrario");

if(myInput.value == "" || myInput.value == null)
{
    flatpickr(myInput,
        {
            enableTime: true,
            minDate: "today",
            defaultDate: "today",
            onChange: OnChangeDate
        });
}
else
{
    flatpickr(myInput,
        {
            enableTime: true,
            minDate: "today",
            onChange: OnChangeDate
        });
}

function OnChangeDate(selectedDates, dateStr, instance)
{
    var dt = new Date(dateStr);
    var minutes = roundUpToAny(dt.getMinutes());
    dt.setMinutes(minutes);

    instance.setDate(dt);
    console.log(minutes);
}

function roundUpToAny($n, $x = 5)
{
    return (Math.round($n) % $x === 0) ? Math.round($n) : Math.round(($n + $x / 2) /$x) * $x;
}