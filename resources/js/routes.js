import Welcome from './components/WelcomeComponent'
import Create from './components/CreateComponent'
import Edit from './components/EditComponent'
export default {
    mode: 'history',
    base: '/',
    fallback: true,
    routes: [
        {
            path: '/',
            component: Welcome,
            name: 'Welcome'
        },
        {
            path: '/create',
            component: Create,
        },
        {
            name: 'edit',
            path: '/edit/:id',
            component: Edit,
        }
    ]
}