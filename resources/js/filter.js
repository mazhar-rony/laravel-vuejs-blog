import Vue from 'vue'
import moment from 'moment'

Vue.filter('dateformat', (arg) => {
    //return moment(arg).format("MMM Do YYYY")
    return moment(arg, "YYYYMMDD").fromNow()
})