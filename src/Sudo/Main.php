<?php

namespace Sudo;

use pocketmine\nbt\tag\{
	CompoundTag,
	FloatTag};
	
use pocketmine\plugin\PluginBase;
use pocketmine\level\Level;
use pocketmine\event\Listener;

use pocketmine\inventory\{
	Inventory,
	EnderChestInventory,
	ChestInventory,
	FurnaceInventory};
	
use pocketmine\event\inventory\InventoryOpenEvent;
use pocketmine\entity\object\PrimedTNT;

use pocketmine\entity\{
	Skin,
	Entity};
	
use pocketmine\item\{
	ItemFactory,
	ItemIds,
	Item};
	
use pocketmine\item\enchantment\{
	ProtectionEnchantment,
	EnchantmentInstance,
	Enchantment};
	
use pocketmine\utils\{
	Config,
	TextFormat as TF};
	
use pocketmine\block\{
	Block,
	Lava,
	Water,
	Stair};
	
use pocketmine\{
	Server,
	Player};
	
use pocketmine\event\player\{
	PlayerCommandPreprocessEvent,
	PlayerChangeSkinEvent,
	PlayerItemConsumeEvent,
	PlayerRespawnEvent, 
	PlayerGameModeChangeEvent,
	PlayerKickEvent,
	PlayerMoveEvent,
	PlayerLoginEvent, 
	PlayerQuitEvent,
	PlayerChatEvent,
	PlayerDeathEvent,
	PlayerJoinEvent,
	PlayerInteractEvent,
	PlayerDropItemEvent};
	
use pocketmine\event\entity\{
	EntityLevelChangeEvent,
	EntityShootBowEvent,
	EntityDamageEvent,
	ExplosionPrimeEvent,
	EntityDamageByEntityEvent,
	EntityDamageByEntity};
	
use pocketmine\network\mcpe\protocol\{
		ModalFormResponsePacket,
		ServerSettingsRequestPacket,
		ServerSettingsResponsePacket,
		AddEntityPacket, 
		SetEntityLinkPacket,
		RemoveActorPacket,
		PlayerActionPacket,
		types\EntityLink};
	
use pocketmine\event\block\{
	ItemFrameDropItemEvent,
	BlockBreakEvent,
	BlockPlaceEvent,
	BlockUpdateEvent};
	
use pocketmine\command\{
	Command,
	ConsoleCommandSender,
	CommandSender};

use pocketmine\level\particle\{
	DustParticle,
	PortalParticle,
	HugeExplodeParticle,
	DestroyBlockParticle};
	
use pocketmine\math\Vector3;

use pocketmine\event\server\DataPacketReceiveEvent;

use pocketmine\level\sound\{
	EndermanTeleportSound,
	GhastSound,
	Sound};

	
	
//****************排行榜use***************//
use pocketmine\level\Position;

use pocketmine\network\mcpe\protocol\{
	AddPlayerPacket,
	PlayerListPacket,
	types\PlayerListEntry};

use pocketmine\utils\UUID;
//****************************************//
class Main extends PluginBase implements Listener{

    public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Sudo Plugins have been enabled");
    }
    
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
		switch ($command->getName()) {
            case "sudo":
            if (count($args) < 2) {
                $sender->sendMessage("§e操控系統 §b>　§d請輸入玩家ID 和 指令");
                return true;
            }
            $player = $this->getServer()->getPlayer(array_shift($args));
            if ($player instanceof Player) {
                $this->getServer()->dispatchCommand($player, trim(implode(" ", $args)));
                return true;
            } else {
                $sender->sendMessage("§e操控 §b> §d找不到該玩家TwT");
                return true;
              }
            }
        }

        public function onDisable() : void{
            $this->getLogger()->info("SEXDCore Shutdown Completed!");
        }
    }