function showCourse1()
{
    document.querySelector("#hide_Course1").style.display = "block";
    document.querySelector("#hide_Course2").style.display = "none";
    document.querySelector("#hide_Course3").style.display = "none";
}

function showCourse2()
{
    document.querySelector("#hide_Course1").style.display = "none";
    document.querySelector("#hide_Course2").style.display = "block";
    document.querySelector("#hide_Course3").style.display = "none";
}

function showCourse3()
{
    document.querySelector("#hide_Course1").style.display = "none";
    document.querySelector("#hide_Course2").style.display = "none";
    document.querySelector("#hide_Course3").style.display = "block";
}