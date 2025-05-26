//import './bootstrap';
// Import hardcoded below
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// End import

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
