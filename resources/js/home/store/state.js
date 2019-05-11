let defaultCity = '桂林'
try{
    if(localStorage.cityName){
        defaultCity = localStorage.cityName
    }
} catch(e){}

export default{
    cityName:defaultCity
}