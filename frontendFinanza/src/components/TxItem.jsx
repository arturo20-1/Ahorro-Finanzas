import { Icon } from './ui';
import { money, shortDate } from '../lib/format';

// Una fila de transacción (la usan el dashboard y la lista de transacciones)
export default function TxItem({ tx }) {
  const income = tx.type === 'income';
  const color = (tx.category && tx.category.color) || '#6d7a72';

  return (
    <li className="flex items-center gap-space-md py-space-sm">
      <div className="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style={{ backgroundColor: `${color}22`, color }}>
        <Icon name={(tx.category && tx.category.icon) || 'receipt_long'} className="text-[22px]" />
      </div>
      <div className="min-w-0 flex-1">
        <p className="font-label-lg text-label-lg text-on-surface truncate">{tx.description || (tx.category && tx.category.name)}</p>
        <p className="font-label-md text-label-md text-on-surface-variant truncate">
          {tx.category && tx.category.name} · {tx.account && tx.account.name} · {shortDate(tx.date)}
        </p>
      </div>
      <span className={`font-label-lg text-label-lg font-bold whitespace-nowrap ${income ? 'text-primary' : 'text-error'}`}>
        {income ? '+' : '-'}
        {money(tx.amount)}
      </span>
    </li>
  );
}
