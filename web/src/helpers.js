import {toast} from "react-toastify";

export function formatDate(date) {
    if (!date) return date;
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}


export const catchErrorMessage = (e) => {
    if (e.response) {
        const res = e.response.data;

        if (res.message) {
            toast.error(res.message)
        } else if (res.error) {
            toast.error(res.error)
        }
    }
    return e;
}

export const serialize = (obj) => {
    var str = [];
    for (var p in obj)
        if (obj.hasOwnProperty(p)) {
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
    return str.join("&");
}