import flatpickr from "flatpickr";
import {French} from 'flatpickr/dist/l10n/fr.js';

/**
 * @property {flatpickr} flatpickr
 */
export default class DateTimePicker extends HTMLInputElement
{
  connectedCallback () {
    this.flatpickr = flatpickr(this, {
      locale: French,
      altFormat: 'd F Y H:i',
      dateFormat: "Y-m-d H:i",
      enableTime: true,
      time_24hr: true,
      // defaultDate: "today",
      minDate: "today",
      minuteIncrement: 30,
      altInput: true,
    })
  }

  disconnectedCallback () {
    this.flatpickr.destroy()
  }
}

global.customElements.define('datetime-picker', DateTimePicker, {extends: 'input'})