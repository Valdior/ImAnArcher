import flatpickr from "flatpickr";
import {French} from 'flatpickr/dist/l10n/fr.js';

/**
 * @property {flatpickr} flatpickr
 */
export default class DatePicker extends HTMLInputElement
{
  connectedCallback () {
    this.flatpickr = flatpickr(this, {
      locale: French,
      altFormat: 'd F Y',
      dateFormat: "Y-m-d",
      altInput: true,
      enableTime: false,
      //defaultDate: "today",
    })
  }

  disconnectedCallback () {
    this.flatpickr.destroy()
  }
}

global.customElements.define('date-picker', DatePicker, {extends: 'input'})