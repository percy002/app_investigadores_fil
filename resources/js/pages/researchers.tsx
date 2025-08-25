import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { BreadcrumbItem, type SharedData } from '@/types';
import { Head, usePage } from '@inertiajs/react';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
export default function Researchers() {
    const { auth } = usePage<SharedData>().props;

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Investigadores" />
            <div className="flex gap-12">
                <div className="flex pt-12 pr-5 pb-1 pl-[150px] flex-col justify-center items-center gap-2.5 flex-1">
                    <h1 className="text-2xl font-bold">Welcome, {auth.user.name}!</h1>
                    <p className="text-sm text-muted-foreground">Here’s what’s happening in your account:</p>
                </div>
                <div className="flex-1">
                    <img src="/images/inicio.jpg" alt="" />
                </div>
            </div>
        </AppLayout>
    );
}
