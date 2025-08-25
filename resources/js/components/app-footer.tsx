import * as React from 'react';

interface AppContentProps extends React.ComponentProps<'main'> {
    variant?: 'header' | 'sidebar';
}

export function AppFooter({ variant = 'header', ...props }: AppContentProps) {
    return (
        <footer>
            <div className="flex gap-12 px-[100px] py-10">
                <div className="flex-1">
                    <div className="flex flex-col items-center gap-2.5">
                        <img className="h-auto w-[300px]" src="/images/logos/logo_vrim.png" alt="" />
                        <p>
                            “Nada tiene tanto poder para ampliar la mente como la capacidad de investigar de forma sistemática y real todo lo que es
                            susceptible de observación en la vida”. Marco Aurelio
                        </p>
                    </div>
                </div>
                <div className="flex-1">
                    <div className="flex justify-center">
                        <ul className="flex flex-col gap-2.5">
                            <li>Innovación y Transferencia</li>
                            <li>Investigación</li>
                            <li>Desarrollo</li>
                        </ul>
                    </div>
                </div>
                <div className="flex-1">
                    <div className="flex justify-center">
                        <ul className="flex flex-col gap-2.5">
                            <li>Innovación y Transferencia</li>
                            <li>Investigación</li>
                            <li>Desarrollo</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    );
}
