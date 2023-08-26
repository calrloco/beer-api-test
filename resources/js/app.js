import './bootstrap';
import App from './App.svelte';

// Your selected Skeleton theme:
import '@skeletonlabs/skeleton/themes/theme-hamlindigo.css';

// This contains the bulk of Skeletons required styles:
import '@skeletonlabs/skeleton/styles/skeleton.css';

const app = new App({
    target: document.body,
});



export default app;
