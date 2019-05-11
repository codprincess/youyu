export default {
    changeCity(state,cityName){
        state.cityName = cityName
        try{
            localStorage.cityName = cityName
        }catch(e){}
    }
}