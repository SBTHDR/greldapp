import Welcome from './components/WelcomeComponent'
export default {
    mode: 'history',
    base: '/',
    fallback: true,
    routes: [
        {
            path: '/',
            component: Welcome,
            name: Welcome
        }
    ]
}