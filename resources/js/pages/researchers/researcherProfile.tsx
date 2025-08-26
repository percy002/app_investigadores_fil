import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/react';

import { TabItem, Tabs } from 'flowbite-react';
import { HiAdjustments, HiClipboardList, HiUserCircle } from 'react-icons/hi';
import { MdDashboard } from 'react-icons/md';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
export default function researcherProfile() {
    const { researcher } = usePage<{ researcher: any }>().props;
    console.log(researcher);

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="" />
            <div className="flex w-full flex-col">
                {/* FOTO */}
                <div className="flex">
                    <img className="size-40" src="/images/avatar.jpg" alt="" />
                    <div className="flex flex-col text-white">
                        <span className="font-bold">
                            {researcher.first_name} {researcher.last_name_father} {researcher.last_name_mother}
                        </span>
                        <span className="text-sm text-muted-foreground">{researcher.academic_department}</span>
                    </div>
                </div>

                {/* CONTENIDO DE INVESTIGADOR */}
                <Tabs aria-label="Tabs with icons" variant="underline">
                    <TabItem active title="Profile" icon={HiUserCircle}>
                        This is <span className="font-medium text-gray-800 dark:text-white">Profile tab's associated content</span>. Clicking another
                        tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility
                        and styling.
                    </TabItem>
                    <TabItem title="Dashboard" icon={MdDashboard}>
                        This is <span className="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</span>. Clicking
                        another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content
                        visibility and styling.
                        <div className="">
                            {researcher.projects && researcher.projects.length > 0 ? (
                                <ul>
                                    {researcher.projects.map((project: any) => (
                                        <li key={project.id}>{project.title}</li>
                                    ))}
                                </ul>
                            ) : (
                                <p>No se encontraron proyectos.</p>
                            )}
                        </div>
                    </TabItem>
                    <TabItem title="Settings" icon={HiAdjustments}>
                        This is <span className="font-medium text-gray-800 dark:text-white">Settings tab's associated content</span>. Clicking another
                        tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility
                        and styling.
                    </TabItem>
                    <TabItem title="Contacts" icon={HiClipboardList}>
                        This is <span className="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</span>. Clicking another
                        tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility
                        and styling.
                    </TabItem>
                    <TabItem disabled title="Disabled">
                        Disabled content
                    </TabItem>
                </Tabs>
            </div>
        </AppLayout>
    );
}
