<?php

namespace App\Http\Livewire;

use App\Models\Filiere;
use App\Models\ProprieteSpecialite;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TypeArticleComp extends Component
{
    use WithPagination;

    public $search = "";
    public $isAddTypeArticle = false;
    public $newTypeArticleName = "";
    public $newPropModel = [];
    public $editPropModel = [];
    public $newValue = "";
    public $selectedTypeArticle;

    protected $paginationTheme = "bootstrap";

    public function render()
    {

        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "typearticles" => Filiere::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            "proprietesTypeArticles" => ProprieteSpecialite::where("filiere_id", optional($this->selectedTypeArticle)->id)->get()
        ];
        return view('livewire.typearticles.index', $data)
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function toggleShowAddTypeArticleForm()
    {
        if ($this->isAddTypeArticle) {
            $this->isAddTypeArticle = false;
            $this->newTypeArticleName = "";
            $this->resetErrorBag(["newTypeArticleName"]);
        } else {
            $this->isAddTypeArticle = true;
        }
    }

    public function addNewTypeArticle()
    {
        $validated = $this->validate([
            "newTypeArticleName" => "required|max:50|unique:filieres,nom"
        ]);

        Filiere::create(["nom" => $validated["newTypeArticleName"]]);

        $this->toggleShowAddTypeArticleForm();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "filiere ajouté à jour avec succès!"]);
    }

    public function editTypeArticle(Filiere $typeArticle)
    {
        $this->dispatchBrowserEvent("showEditForm", ["typearticle" => $typeArticle]);
    }

    public function updateTypeArticle(Filiere $typeArticle, $valueFromJS)
    {
        $this->newValue = $valueFromJS;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("filieres", "nom")->ignore($typeArticle->id)]
        ]);

        $typeArticle->update(["nom" => $validated["newValue"]]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "filiere mis à jour avec succès!"]);
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des filieres. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "filiere_id" => $id
            ]
        ]]);
    }

    public function deleteTypeArticle(Filiere $typeArticle)
    {
        $typeArticle->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "filiere supprimé avec succès!"]);
    }

    public function showProp(Filiere $typeArticle)
    {

        $this->selectedTypeArticle = $typeArticle;

        $this->dispatchBrowserEvent("showModal", []);
    }

    public function addProp()
    {
        $validated = $this->validate([
            "newPropModel.nom" => [
                "required",
                Rule::unique("propriete_specialites", "nom")->where("filiere_id", $this->selectedTypeArticle->id)
            ],
            "newPropModel.estObligatoire" => "required"
        ]);

        ProprieteSpecialite::create([
            "nom" => $this->newPropModel["nom"],
            "estObligatoire" => $this->newPropModel["estObligatoire"],
            "filiere_id" => $this->selectedTypeArticle->id,
        ]);

        $this->newPropModel = [];
        $this->resetErrorBag();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété ajoutée avec succès!"]);
    }

    function showDeletePrompt($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer '$name' de la liste des propriétés de specialites. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "propriete_id" => $id
            ]
        ]]);
    }

    public function deleteProp(ProprieteSpecialite $proprieteArticle)
    {

        $proprieteArticle->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété supprimée avec succès!"]);
    }

    public function editProp(ProprieteSpecialite $proprieteArticle)
    {

        $this->editPropModel["nom"] = $proprieteArticle->nom;
        $this->editPropModel["estObligatoire"] = $proprieteArticle->estObligatoire;
        $this->editPropModel["id"] = $proprieteArticle->id;

        $this->dispatchBrowserEvent("showEditModal", []);
    }

    public function updateProp()
    {
        $this->validate([
            "editPropModel.nom" => [
                "required",
                Rule::unique("propriete_specialites", "nom")->ignore($this->editPropModel["id"])
            ],
            "editPropModel.estObligatoire" => "required"
        ]);

        ProprieteSpecialite::find($this->editPropModel["id"])->update([
            "nom" => $this->editPropModel["nom"],
            "estObligatoire" => $this->editPropModel["estObligatoire"]
        ]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété mise à jour avec succès!"]);
        $this->closeEditModal();
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent("closeModal", []);
    }

    public function closeEditModal()
    {
        $this->editPropModel = [];
        $this->resetErrorBag();
        $this->dispatchBrowserEvent("closeEditModal", []);
    }
}
