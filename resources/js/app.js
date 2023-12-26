import "../css/app.css";

import { createApp, h } from 'vue'
import { createInertiaApp, router, Head, Link } from '@inertiajs/vue3'
import NProgress from 'nprogress'

import Layout from '@/Shared/Layout.vue';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    if(page.default.layout === undefined) {
      page.default.layout = Layout
    }
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .mount(el)
  },
  title: title => `${title} - My App`,
  progress: false,
})

NProgress.configure({ showSpinner: false });

router.on("start", () => NProgress.start());

router.on("finish", () => NProgress.done());