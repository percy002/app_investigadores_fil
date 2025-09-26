import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { BreadcrumbItem, type SharedData } from '@/types';
import { Head, usePage } from '@inertiajs/react';
import { log } from 'console';
import { useEffect } from 'react';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
export default function Researchers() {
    const { auth } = usePage<SharedData>().props;
    const { researchers } = usePage<SharedData & { researchers: any[] }>().props;
    useEffect(() => {
        // Perform any side effects or data fetching here
        console.log(researchers);
    }, [researchers]);

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Investigadores" />
            <div className="flex w-full flex-col">
                <div className="flex w-full justify-center">
                    <h1 className="text-center">Actividad investigadora de la UNSAAC</h1>
                </div>
                <div className="px-[150px] py-12">
                    <div className="grid grid-cols-3 gap-6">
                        {Array.isArray(researchers) &&
                            researchers.length > 0 &&
                            researchers.map((researcher) => (
                                <div className="col-span-1" key={researcher.id}>
                                    <div className="flex items-center">
                                        <img className="size-24 rounded-[100px] aspect-square object-cover" src="/images/avatar.jpg" alt="" />
                                        <div className="ml-4 flex flex-col">
                                            <span className="font-bold">
                                                {researcher.apellidos_nombres}
                                            </span>
                                            <span className="text-sm text-muted-foreground">{researcher.academic_department}</span>
                                        </div>
                                    </div>
                                </div>
                            ))}
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
