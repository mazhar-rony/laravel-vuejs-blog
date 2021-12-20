import Vue from 'vue'
import moment from 'moment'

Vue.filter('dateformat', (arg) => {
    //return moment(arg).format("MMM Do YYYY")
    return moment(arg, "YYYYMMDD").fromNow()
})

Vue.filter('shortlength', (text, lenght, suffix) => {
    return text.substring(0, lenght) + suffix;
})